<?php 
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class BlockManagement implements \AlbertMage\PageBuilder\Api\BlockManagementInterface
{

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

	/**
	 * @var \Magento\Cms\Model\BlockFactory
	 */
	protected $blockFactory;

	/**
	 * @var \Magento\Cms\Api\GetBlockByIdentifierInterfaceFactory
	 */
	protected $getBlockByIdentifierInterfaceFactory;

	/**
	 * @var \AlbertMage\PageBuilder\Model\Dom
	 */
	protected $dom;

	/**
	 * @param \Magento\Store\Model\StoreManagerInterface $storeManager
	 * @param \Magento\Cms\Model\BlockFactory $blockFactory
	 * @param \Magento\Cms\Api\GetBlockByIdentifierInterfaceFactory $getBlockByIdentifierInterfaceFactory
	 * @param \AlbertMage\PageBuilder\Model\Dom $dom
	 */
	public function __construct(
		\Magento\Store\Model\StoreManagerInterface $storeManager,
		\Magento\Cms\Model\BlockFactory $blockFactory,
		\Magento\Cms\Api\GetBlockByIdentifierInterfaceFactory $getBlockByIdentifierInterfaceFactory,
		\AlbertMage\PageBuilder\Model\Dom $dom
	)
	{
		$this->storeManager = $storeManager;
		$this->blockFactory = $blockFactory;
		$this->getBlockByIdentifierInterfaceFactory = $getBlockByIdentifierInterfaceFactory;
		$this->dom = $dom;
	}

	/**
	 * @inheritdoc
	 */
	public function getBlockByIdentifier(string $blockIdentifier)
	{	
		$block = $this->getBlockByIdentifierInterfaceFactory->create()->execute($blockIdentifier, $this->storeManager->getStore()->getId());
		return $this->dom->parse($block->getContent());
	}

	/**
	 * @inheritdoc
	 */
	public function getBlockById(int $blockId)
	{	
		$block = $this->blockFactory->create()->load($blockId);
		return $this->dom->parse($block->getContent());
	}

}