<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

use \Magento\Framework\App\ObjectManager;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Products extends \AlbertMage\PageBuilder\Model\Dom\Element
{
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
            if (isset($config['show'])) {
                $fieldName = $config['show'] ? $this->getFieldName($config['show']) : $element;
                $data = [$fieldName => $data];
            }
        }

        // Process text element (not defined)
        $filter = ObjectManager::getInstance()->get(\AlbertMage\PageBuilder\Model\Directive\Filter::class);
        $products = $filter->filter($domElement->firstChild->wholeText);
        $data['items'] = $products['items'];
        return $data;

    }
}
