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
    /**
     * Return data in the widget.
     *
     * @return array
     */
    public function getProductList();

    /**
     * Get product data.
     *
     * @return \Magento\Framework\DataObject
     */
    public function getProductData(\Magento\Catalog\Model\Product $product);
}
