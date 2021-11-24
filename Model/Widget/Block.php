<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Widget;

use Magento\Framework\App\ObjectManager;

/**
 *
 */
class Block extends \Magento\Framework\DataObject implements \AlbertMage\PageBuilder\Model\Widget\BlockInterface
{
    /**
     * @var \Magento\Cms\Model\BlockFactory
     */
    protected $_blockFactory;

    /**
     * @param \Magento\Cms\Model\BlockFactory $blockFactory
     */
    public function __construct(
        \Magento\Cms\Model\BlockFactory $blockFactory,
        array $params
    ) {
        $this->_blockFactory = $blockFactory;
        parent::__construct(
            $params
        );
    }

    /**
     * 
     */ 
    public function getBlock(\AlbertMage\PageBuilder\Model\Directive\Filter $filter): array
    {
        $block = $this->_blockFactory->create();
        $block->setStoreId($this->getData('store_id'))->load($this->getData('block_id'));
        return [
            'type' => $this->getData('type_name'),
            'block' => $filter->filter($block->getContent())
        ];
    }
}