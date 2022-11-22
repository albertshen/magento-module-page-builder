<?php 
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Block implements \AlbertMage\PageBuilder\Api\BlockInterface
{

	/**
	 * @var \Magento\Cms\Model\BlockFactory
	 */
	protected $blockFactory;

	/**
	* @param \Magento\Cms\Model\BlockFactory
	* @param \AlbertMage\PageBuilder\Model\Dom
	*/
	public function __construct(
		\Magento\Cms\Model\BlockFactory $blockFactory,
		\AlbertMage\PageBuilder\Model\Dom $dom
	)
	{
		$this->blockFactory = $blockFactory;
		$this->dom = $dom;
	}

	/**
	 * @inheritdoc
	 */
	public function getBlock($blockId)
	{
		$block = $this->blockFactory->create()->load($blockId);
		return $this->dom->parse($block->getContent());
	}

}