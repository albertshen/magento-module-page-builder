<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Widget;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface ProductListInterface
{
    
    const TYPE = 'products';

    /**
     * Return data in the widget.
     *
     * @return array
     */
    public function getProductList();

    /**
     * Get product data.
     *
     * @return \AlbertMage\Catalog\Api\Data\ProductListItemInterface $product
     */
    public function getProductListItem(\Magento\Catalog\Model\ProductListItem $product);
}
