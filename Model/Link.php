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
     * @param \Magento\Store\Model\StoreManagerInterface
     * @param array
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $providers
    )
    {
        $storeCode = $storeManager->getStore()->getCode();

        if (isset($providers[$storeCode])) {
            $provider = ObjectManager::getInstance()->get($providers[$storeCode])->setStore($storeManager->getStore());
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
    public function generate($id, $entityType, $params = []): string
    {
        return $this->provider->generate($id, $entityType, $params);
    }
}
