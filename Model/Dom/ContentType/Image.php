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
class Image implements \AlbertMage\PageBuilder\Model\Dom\ElementInterface
{

    /**
     * @var \AlbertMage\PageBuilder\Helper\StoreType
     */
    // protected $storeType;

    /**
     * @param \AlbertMage\PageBuilder\Helper\StoreType
     */
    // public function __construct(
    //     \AlbertMage\PageBuilder\Helper\StoreType $storeType
    // )
    // {
    //     $this->storeType = $storeType;
    // }

    /**
     * Parse Dom
     *
     * @return array
     * @throws LocalizedException
     */
    public function parse($domElement): array
    {

        $data = [];

        // $data[$this->getFieldName('data-content-type')] = $domElement->getAttribute('data-content-type');
        // $data[$this->getFieldName('data-appearance')] = $domElement->getAttribute('data-appearance');
        // if ($domElement->childNodes->length === 1) {
        //     //$data['link']
        // }
        return $data;
    }

}
