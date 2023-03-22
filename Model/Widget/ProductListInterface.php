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
     * Get product list.
     *
     * @return \AlbertMage\Catalog\Api\Data\ProductInterface[]
     */
    public function getProductList();
    
}
