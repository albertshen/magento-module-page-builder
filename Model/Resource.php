<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\App\ObjectManager;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Resource implements ResourceInterface
{
    /**
     * @var array
     */
    private $resourceClassCollection;

    /**
     * @param \Magento\Store\Model\StoreManagerInterface
     * @param array
     */
    public function __construct(
        array $resourceClassCollection
    )
    {
        $this->resourceClassCollection = $resourceClassCollection;
    }

    /**
     * @inheritDoc
     */
    public function process($resources)
    {
        $resourceType = $this->getResouceType();

        if (isset($this->resourceClassCollection[$resourceType])) {
            $parser = ObjectManager::getInstance()->get($this->resourceClassCollection[$resourceType]);
            if (!$parser instanceof ResourceInterface) {
                throw new \InvalidArgumentException(
                    __('Resource parser should be an instance of ResourceInterface.')
                );
            }
            return $parser->process($resources);
        }

        throw new \Magento\Framework\Exception\LocalizedException(
            __('There is no resource type for given code')
        );
    }

    /**
     * Get Resource Type
     * For Plugin
     */
    public function getResouceType()
    {
        return self::MOBILE;
    }


}
