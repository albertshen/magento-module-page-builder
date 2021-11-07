<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model;

use AlbertMage\PageBuilder\Api\LinkProviderInterface;

/**
 *
 */
class Link
{

    // /**
    //  * @var \Magento\Store\Model\StoreManagerInterface
    //  */
    // protected $_storeManager;

    // /**
    //  * @var LinkProviderInterface[]
    //  */
    // private $linkProviderCollection;

    /**
     * @var LinkProviderInterface
     */
    private $provider;


    /**
     * @param \AlbertMage\PageBuilder\Model\ParserPool
     * @param LinkProviderInterface[] $linkProviderCollection
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $linkProviderCollection
    )
    {

        foreach ($linkProviderCollection as $provider) {
            if (!$provider instanceof LinkProviderInterface) {
                throw new \InvalidArgumentException(
                    __('Link provider should be an instance of LinkProviderInterface.')
                );
            }
        }

        $storeCode = $storeManager->getStore()->getCode();
        if (isset($linkProviderCollection[$storeCode])) {
            $this->provider = $linkProviderCollection[$storeCode];
        } else {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('There is no LinkProvider for given type')
            );
        }

    }

    /**
     * Generate link or path for diferent store
     *
     * @return string
     */
    public function generate($link): string
    {
        return $this->provider->generate($link);
    }
}
