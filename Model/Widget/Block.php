<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Widget;

use Magento\Framework\App\ObjectManager;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Block extends \Magento\Framework\DataObject implements \AlbertMage\PageBuilder\Model\Widget\BlockInterface
{
    /**
     * @var \Magento\Cms\Model\BlockFactory
     */
    protected $_blockFactory;

    /**
     * @var \AlbertMage\PageBuilder\Model\Dom
     */
    protected $dom;

    /**
     * @param \Magento\Cms\Model\BlockFactory $blockFactory
     */
    public function __construct(
        \Magento\Cms\Model\BlockFactory $blockFactory,
        \AlbertMage\PageBuilder\Model\Dom $dom,
        array $params
    ) {
        $this->_blockFactory = $blockFactory;
        $this->dom = $dom;
        parent::__construct(
            $params
        );
    }

    /**
     * 
     */ 
    public function getBlock(): array
    {
        $block = $this->_blockFactory->create();
        $block->setStoreId($this->getData('store_id'))->load($this->getData('block_id'));
        return [
            'type' => $this->getData('type_name'),
            'block' => $this->dom->parse($block->getContent())
        ];
    }
}