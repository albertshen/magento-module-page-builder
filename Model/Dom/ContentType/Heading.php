<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

/**
 *
 * @api
 * @since 100.0.2
 */
class Heading extends \AlbertMage\PageBuilder\Model\Dom\Element
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
        $data['heading'] = $domElement->tagName;

        return $data;
    }

}
