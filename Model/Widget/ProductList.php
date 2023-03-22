<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Widget;

use AlbertMage\PageBuilder\Model\Widget\AbstractProduct;

/**
 * Product list
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class ProductList extends AbstractProduct
{

    /**
     * @inheritdoc
     */
    public function getProductList()
    {
        $data = [];
        $block = $this->createCollection();
        foreach ($block->getItems() as $product) {
            $data[] = $this->productManagement->getListItem($product->getId());
        }
        return $data;
    }
}
