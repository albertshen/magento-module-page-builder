<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model;

/**
 *
 */
class Parser implements \AlbertMage\PageBuilder\Api\ParserInterface
{
    /**
     * @var \AlbertMage\PageBuilder\Model\ParserPool
     */
    protected $parserPool;

    /**
     * @var \AlbertMage\PageBuilder\Model\Link
     */
    protected $link;

    /**
     * @var string
     */
    protected $appearance;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * @param \AlbertMage\PageBuilder\Model\ParserPool
     * @param \AlbertMage\PageBuilder\Model\Link
     * @param array
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\ParserPool $parserPool,
        \AlbertMage\PageBuilder\Model\Link $link,
        array $attributes = []
    )
    {
        $this->parserPool = $parserPool;
        $this->link = $link;
        $this->attributes = $attributes;
    }

    /**
     * Parse Dom
     *
     * @return array
     * @throws LocalizedException
     */
    public function parse($domElement): array
    {

        $this->appearance = $domElement->getAttribute('data-appearance');

        return $this->doParse($domElement);
        
    }

    public function doParse($domElement)
    {
        $element = $domElement->getAttribute('data-element');

        $data = [];

        if (isset($this->attributes[$this->appearance][$element])) {
            $data = $this->extractAttributes($domElement, $this->attributes[$this->appearance][$element]);
        } else {
            if (isset($this->attributes['default'][$element])) {
                $data = $this->extractAttributes($domElement, $this->attributes['default'][$element]);
            }
            if ($element === 'link') {
                $data = array_merge($data, ['path' => 'page/dd/22']);
            }
        }

        foreach ($domElement->childNodes as $node) {
            if ($node->getAttribute('data-element') === 'main') {
                $contentType = $node->getAttribute('data-content-type');
                $data['items'][] = $this->parserPool->create($contentType)->parse($node);
            } else {
                $data = array_merge($data, $this->doParse($node));
            }
        }

        return $data;
    }

    private function extractAttributes($domElement, $config)
    {
        $data = [];
        foreach ($config as $attribute => $parser) {
            if ($parser instanceof \AlbertMage\PageBuilder\Api\AttributeParserInterface) {
                $data[$this->getFieldName($attribute)] = $parser->parse($domElement->getAttribute($attribute));
            } else {
                $data[$this->getFieldName($attribute)] = $domElement->getAttribute($attribute);
            }
        }
        return $data;
    }

    protected function getFieldName(string $str): string 
    {
        $str = preg_replace('/^data-/i', '', $str);
        return $this->kebabToCamel($str);
    }

    /**
     * convert kebab-case to PascalCase
     */
    protected function kebabToPascal(string $str): string
    {
       return str_replace(' ', '', ucwords(str_replace( '-', ' ', $str)));
    }

    /**
     * convert kebab-case to camelCase
     */
    protected function kebabToCamel(string $str): string
    {
        return lcfirst($this->kebabToPascal($str));
    }
}
