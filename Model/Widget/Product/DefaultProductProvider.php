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
      $data['type'] = 'products';
      foreach ($block->getItems() as $item) {
         $data['items'][] = [
            'sku' => $item->getSku(),
            'url' => $this->link->generate($item->getId(), 'product')
         ];
      }
      return $data;
   }
}
