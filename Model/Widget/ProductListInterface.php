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
namespace AlbertMage\PageBuilder\Model\Widget;

/**
 * Interface \AlbertMage\PageBuilder\Model\Widget\ProductListInterface
 */
interface ProductListInterface
{
    /**
     * Return data in the widget.
     *
     * @return array
     */
    public function getProductList();
}
