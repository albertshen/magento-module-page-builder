<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Widget Block Interface
 *
 * @author <albertshen1206@gmail.com>
 */
namespace AlbertMage\PageBuilder\Model\Widget\Product;

/**
 * Interface \AlbertMage\PageBuilder\Model\Widget\Product\ProductListProviderInterface
 */
interface ProductListProviderInterface
{
    /**
     * Return data in the widget.
     *
     * @return array
     */
    public function getProductList() : array;
}
