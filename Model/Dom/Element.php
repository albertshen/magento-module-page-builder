<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Dom;

/**
 *
 */
class Element implements ElementInterface
{
    /**
     * @var \AlbertMage\PageBuilder\Model\Dom\ElementPool
     */
    protected $elementPool;

    /**
     * @var \AlbertMage\PageBuilder\Model\HrefElement
     */
    protected $hrefElement;

    /**
     * @var string
     */
    protected $appearance;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * @param \AlbertMage\PageBuilder\Model\Dom\ElementPool
     * @param \AlbertMage\PageBuilder\Model\Dom\HrefElement
     * @param array
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\Dom\ElementPool $elementPool,
        \AlbertMage\PageBuilder\Model\Dom\HrefElement $hrefElement,
        array $attributes = []
    )
    {
        $this->elementPool = $elementPool;
        $this->hrefElement = $hrefElement;
        $this->attributes = $attributes;
    }

    /**
     * Parse Dom
     *
     * @return array
     * @throws LocalizedException
     */
    public function parse(\DOMElement $domElement): array
    {

        $this->appearance = $domElement->getAttribute('data-appearance');

        return $this->doParse($domElement);
        
    }

    public function doParse(\DOMElement $domElement)
    {
        $element = $domElement->getAttribute('data-element');

        $data = [];

        $config = $this->attributes[$this->appearance][$element] ?? ($this->attributes['default'][$element] ?? []);

        if ($config) {
            $data = $this->extractAttributes($domElement, $config);
        } else {
            // attributes not defined
            if ($element === 'link') {
                $data['link'] = $this->hrefElement->parse($domElement);
            }
        }

        // Process text element
        if (count($domElement->childNodes) === 1 && $domElement->childNodes[0] instanceof \DOMText) {
            $filter = \Magento\Framework\App\ObjectManager::getInstance()->get(\AlbertMage\PageBuilder\Model\Directive\Filter::class);
            if ($domElement->getAttribute('data-content-type') === 'products') {
                $products = $filter->filter($domElement->childNodes[0]->wholeText);
                $data['items'] = $products['items'];
            } else {
                $data[$domElement->getAttribute('data-element')] = $filter->filter($domElement->childNodes[0]->wholeText);
            }
            return $data;
        }

        // Core processor
        foreach ($domElement->childNodes as $node) {
            if ($node->getAttribute('data-element') === 'main') {
                $contentType = $node->getAttribute('data-content-type');
                $data['items'][] = $this->elementPool->create($contentType)->parse($node);
            } else {
                if ($node->getAttribute('data-element') === 'content') {
                    $data[$this->getFieldName('content')] = $this->contentFilter($node->childNodes);
                } else {
                    $data = array_merge($data, $this->doParse($node));
                }
            }
        }

        return $data;
    }

    private function extractAttributes(\DOMElement $domElement, $config)
    {
        $data = [];
        foreach ($config as $attribute => $setting) {
            $fieldName = $setting['field-name'] ?? $this->getFieldName($attribute);
            if (isset($setting['parser']) && $setting['parser'] instanceof \AlbertMage\PageBuilder\Model\Dom\AttributeInterface) {
                $data[$fieldName] = $setting['parser']->parse($domElement->getAttribute($attribute));
            } else {
                $data[$fieldName] = $domElement->getAttribute($attribute);
            }
        }
        return $data;
    }

    private function contentFilter($childNodes)
    {
        $data = [];
        $filter = \Magento\Framework\App\ObjectManager::getInstance()->get(\AlbertMage\PageBuilder\Model\Directive\Filter::class);
        foreach ($childNodes as $childNode) {
            if ($childNode instanceof \DOMText) {
                $data = array_merge($data, $filter->contentFilter($childNode->wholeText));
            } else {
                if ($childNode->tagName === 'img') {
                    array_push($data, [
                        'type' => 'image',
                        'image' => [
                            'src' => $filter->filter($childNode->getAttribute('src')),
                            'alt' => $childNode->getAttribute('alt')
                        ]
                    ]);
                } 
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
