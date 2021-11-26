<?php 
	
namespace AlbertMage\PageBuilder\Model;

class Page implements \AlbertMage\PageBuilder\Api\PageInterface
{

	/**
	 * @var \Magento\Cms\Model\PageFactory
	 */
	protected $pageFactory;

	/**
	* @param \Magento\Cms\Model\PageFactory
	* @param \AlbertMage\PageBuilder\Model\Dom
	*/
	public function __construct(
		\Magento\Cms\Model\PageFactory $pageFactory,
		\AlbertMage\PageBuilder\Model\Dom $dom
	)
	{
		$this->pageFactory = $pageFactory;
		$this->dom = $dom;
	}

	/**
	 * @inheritdoc
	 */
	public function getPage($pageId)
	{
		$page = $this->pageFactory->create()->load($pageId);
		//var_dump(get_class_methods($page));exit;
		return $this->dom->parse($page->getContent());
	}

}