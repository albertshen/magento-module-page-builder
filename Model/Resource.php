<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\App\ObjectManager;

/**
 * Class aggregate all Media Gallery Entry Converters
 *
 * @api
 * @since 100.0.2
 */
class Resource implements ResourceInterface
{
    /**
     * @var array
     */
    private $resourceClassCollection;

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
        array $resourceClassCollection
    )
    {
        $this->_storeManager = $storeManager;
        $this->resourceClassCollection = $resourceClassCollection;
    }

    /**
     * @inheritDoc
     */
    public function process($resources)
    {
        if (isset($this->resourceClassCollection[$this->_storeManager->getStore()->getCode()])) {
            $parser = ObjectManager::getInstance()->get($this->resourceClassCollection[$this->_storeManager->getStore()->getCode()]);
            if (!$parser instanceof ResourceProviderInterface) {
                throw new \InvalidArgumentException(
                    __('Resource parser should be an instance of ResourceProviderInterface.')
                );
            }
            return $parser->process($resources);
        }

        throw new \Magento\Framework\Exception\LocalizedException(
            __('There is no store code for given code')
        );
    }
}
