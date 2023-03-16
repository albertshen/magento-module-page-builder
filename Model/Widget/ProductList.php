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
        $data['type'] = self::TYPE;
        foreach ($block->getItems() as $product) {
            $productData = $this->serviceOutputProcessor->convertValue(
                $this->productManagement->getListItem($product->getId()),
                \AlbertMage\Catalog\Api\Data\ProductInterface::class
            );
            $data['items'][] = $productData;
        }
        return $data;
    }
}
