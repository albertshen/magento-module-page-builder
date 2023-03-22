<?php 
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class PageManagement implements \AlbertMage\PageBuilder\Api\PageManagementInterface
{

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

	/**
	 * @var \Magento\Cms\Model\PageFactory
	 */
	protected $pageFactory;

	/**
	 * @var \Magento\Cms\Api\GetPageByIdentifierInterfaceFactory
	 */
	protected $getPageByIdentifierInterfaceFactory;

	/**
	 * @var \AlbertMage\PageBuilder\Model\Dom
	 */
	protected $dom;

	/**
	 * @param \Magento\Store\Model\StoreManagerInterface $storeManager
	 * @param \Magento\Cms\Model\PageFactory $pageFactory
	 * @param \Magento\Cms\Api\GetPageByIdentifierInterfaceFactory $getPageByIdentifierInterfaceFactory
	 * @param \AlbertMage\PageBuilder\Model\Dom $dom
	 */
	public function __construct(
		\Magento\Store\Model\StoreManagerInterface $storeManager,
		\Magento\Cms\Model\PageFactory $pageFactory,
		\Magento\Cms\Api\GetPageByIdentifierInterfaceFactory $getPageByIdentifierInterfaceFactory,
		\AlbertMage\PageBuilder\Model\Dom $dom
	)
	{
		$this->pageFactory = $pageFactory;
		$this->getPageByIdentifierInterfaceFactory = $getPageByIdentifierInterfaceFactory;
		$this->dom = $dom;
	}

	/**
	 * @inheritdoc
	 */
	public function getPageByIdentifier(string $pageIdentifier)
	{
		$page = $this->getPageByIdentifierInterfaceFactory->create()->execute($pageIdentifier, $this->storeManager->getStore()->getId());
		return $this->dom->parse($page->getContent());
	}

	/**
	 * @inheritdoc
	 */
	public function getPageById(string $pageId)
	{
		$page = $this->pageFactory->create()->load($pageId);
		return $this->dom->parse($page->getContent());
	}

}