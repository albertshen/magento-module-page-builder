<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model;

use AlbertMage\PageBuilder\Model\LinkProviderInterface;
use Magento\Framework\App\ObjectManager;

/**
 *
 */
class Link implements LinkInterface
{

    /**
     * @var LinkProviderInterface
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
            if (!$provider instanceof LinkProviderInterface) {
                throw new \InvalidArgumentException(
                    __('Link should be an instance of LinkProviderInterface.')
                );
            }
            $this->provider = $provider;
        } else {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('There is no LinkProvider for given type')
            );
        }

    }

    /**
     * Generate link or path for diferent store
     * @param $id
     * @param $entiyType
     * @return string
     */
    public function generate($id, $entityType): string
    {
        return $this->provider->generate($id, $entityType, $this->_storeManager->getStore());
    }
}
