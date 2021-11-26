<?php 
	
namespace AlbertMage\PageBuilder\Model;

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
		//var_dump(get_class_methods($page));exit;
		return $this->dom->parse($block->getContent());
	}

}