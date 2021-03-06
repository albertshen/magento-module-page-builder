<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace AlbertMage\PageBuilder\Model;

use Symfony\Component\DomCrawler\Crawler;
use Magento\Cms\Model\Template\Filter;
use Magento\Framework\App\ObjectManager;

/**
 * @api
 * @since 100.0.2
 */
class Dom
{

    /**
     * @var \AlbertMage\PageBuilder\Model\Dom\ElementPool
     */
    private $elementPool;

    /**
     * @param \AlbertMage\PageBuilder\Model\Dom\ElementPool
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\Dom\ElementPool $elementPool
    )
    {
        $this->elementPool = $elementPool;
    }

    /**
     * Parse Dom
     *
     * @return array
     * @throws LocalizedException
     */
    public function parse($content): array
    {
        
        $crawler = new Crawler($content);

        $crawler = $crawler->filter('body > div');

        $data = [];

        foreach ($crawler as $domElement) {
            $contentType = $domElement->getAttribute('data-content-type');
            $domArray = $this->elementPool->create($contentType)->parse($domElement);
            $data[] = $domArray;
        }

        return $data;
    }
}
