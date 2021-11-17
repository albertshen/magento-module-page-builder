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
 * 
 */
class DefaultProductProvider extends AbstractProduct
{
   /**
    * Retrieve data
    *
    * @return array
    */
   public function getProductList() : array
   {
      $block = $this->createCollection();
      $data = [];
      foreach ($block->getItems() as $item) {
         $data[] = ['sku' => $item->getSku(), 'url' => $item->getProductUrl()];
      }
      return $data;
   }
}
