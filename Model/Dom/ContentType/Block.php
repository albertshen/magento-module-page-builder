<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

use \Magento\Framework\App\ObjectManager;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Block extends \AlbertMage\PageBuilder\Model\Dom\Element
{
    /**
     * Parse Dom
     *
     * @return array
     * @throws LocalizedException
     */
    public function parse($domElement): array
    {

        $data = [];
        $data[$this->getFieldName('data-content-type')] = $domElement->getAttribute('data-content-type');
        $data[$this->getFieldName('data-appearance')] = $domElement->getAttribute('data-appearance');

        $filter = ObjectManager::getInstance()->get(\AlbertMage\PageBuilder\Model\Directive\Filter::class);
        $block = $filter->filter($domElement->firstChild->wholeText);
        $data['block'] = $block;
        return $data;
    }
}