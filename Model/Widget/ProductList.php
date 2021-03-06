<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Widget;

use Magento\Framework\DataObject;
use AlbertMage\PageBuilder\Model\Widget\AbstractProduct;

/**
 *  Product list
 */
class ProductList extends AbstractProduct implements ProductListInterface
{

    /**
     * @inheritdoc
     */
    public function getProductList()
    {
        $block = $this->createCollection();
        $data['type'] = 'products';
        foreach ($block->getItems() as $product) {
            $data['items'][] = $this->getProductData($product)->getData();
        }
        return $data;
    }

    /**
     * @inheritdoc
     */
    public function getProductData(\Magento\Catalog\Model\Product $product)
    {
        $dataObject = new DataObject([
            'sku' => $product->getSku(),
            'url' => $product->getProductUrl()
        ]);

        return $dataObject;
    }
}
