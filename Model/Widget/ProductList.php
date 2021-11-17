<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Widget;

use AlbertMage\PageBuilder\Model\Widget\Product\ProductListProviderInterface;
use Magento\Framework\App\ObjectManager;

/**
 *
 */
class ProductList implements ProductListInterface
{

    /**
     * @var ProductListProviderInterface
     */
    private $provider;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @param \Magento\Store\Model\StoreManagerInterface
     * @param array
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $providers
    )
    {
        $this->_storeManager = $storeManager;
        $storeCode = $storeManager->getStore()->getCode();
        if (isset($providers[$storeCode])) {
            $provider = ObjectManager::getInstance()->get($providers[$storeCode]);
            if (!$provider instanceof ProductListProviderInterface) {
                throw new \InvalidArgumentException(
                    __('Provider should be an instance of ProductListProviderInterface.')
                );
            }
            $this->provider = $provider;
        } else {
            $this->provider = ObjectManager::getInstance()->get($providers['default']);
        }

    }

    /**
     * Get product list
     * @return array
     */
    public function getProductList() : array
    {
        return $this->provider->getProductList();
    }
}
