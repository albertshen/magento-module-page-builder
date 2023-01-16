<?php 
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
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
		return $this->dom->parse($page->getContent());
	}

}