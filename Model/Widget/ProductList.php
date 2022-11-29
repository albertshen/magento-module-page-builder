<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Widget;

use Magento\Framework\DataObject;
use AlbertMage\PageBuilder\Model\Widget\AbstractProduct;

/**
 * Product list
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class ProductList extends AbstractProduct implements ProductListInterface
{

    /**
     * @inheritdoc
     */
    public function getProductList()
    {
        $block = $this->createCollection();
        $data['type'] = self::TYPE;
        foreach ($block->getItems() as $product) {
            $data['items'][] = $this->getProductData($product);
        }
        return $data;
    }

    /**
     * @inheritdoc
     */
    public function getProductData(\Magento\Catalog\Model\Product $product)
    {
        return [];
    }
}
