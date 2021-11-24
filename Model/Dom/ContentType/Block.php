<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

use \Magento\Framework\App\ObjectManager;

/**
 *
 * @api
 * @since 100.0.2
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