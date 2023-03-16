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
    
}
