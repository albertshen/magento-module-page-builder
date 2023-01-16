<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Widget;

use Magento\Framework\App\ObjectManager;
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
        $data = [];
        $block = $this->createCollection();
        $data['type'] = self::TYPE;
        foreach ($block->getItems() as $product) {
            $newProduct = $this->getProductData($product);
            $serviceOutputProcessor = ObjectManager::getInstance()->create(\Magento\Framework\Webapi\ServiceOutputProcessor::class);
            $productData = $serviceOutputProcessor->convertValue($newProduct, \AlbertMage\Catalog\Api\Data\ProductInterface::class);
            $data['items'][] = $productData;
        }
        return $data;
    }

    /**
     * @inheritdoc
     */
    public function getProductData(\Magento\Catalog\Model\Product $product)
    {
        $productManagement = ObjectManager::getInstance()->create(\AlbertMage\Catalog\Api\ProductManagementInterface::class);
        return $productManagement->createProduct($product);
    }
}
