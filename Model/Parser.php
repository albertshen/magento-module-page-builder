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
     * @var string
     */
    protected $appearance;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * @param \AlbertMage\PageBuilder\Model\ParserPool
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\ParserPool $parserPool,
        array $attributes = []
    )
    {
        $this->parserPool = $parserPool;
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
        }

        $childElement = $domElement->childNodes->item(0);

        if ($domElement->childNodes->length === 1 && $childElement->getAttribute('data-element') !== 'main') {
            $data = array_merge($data, $this->doParse($childElement));
        } else {
            foreach ($domElement->childNodes as $node) {
                $contentType = $node->getAttribute('data-content-type');
                $data['items'][] = $this->parserPool->create($contentType)->parse($node);
            }
        }

        return $data;
    }

    private function extractAttributes($domElement, $config)
    {
        $data = [];
        foreach ($config as $attribute => $field) {
            $key = $field ? $field : $attribute;
            $data[$this->getFieldName($key)] = $domElement->getAttribute($attribute);
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
