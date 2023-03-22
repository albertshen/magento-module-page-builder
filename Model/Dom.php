<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

use Symfony\Component\DomCrawler\Crawler;
use Magento\Framework\App\ObjectManager;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
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
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface[]
     * @throws LocalizedException
     */
    public function parse($content): array
    {
        
        $crawler = new Crawler($content);

        $crawler = $crawler->filter('body > div');

        $data = [];

        foreach ($crawler as $domElement) {
            $contentType = $domElement->getAttribute('data-content-type');
            $elements = $this->elementPool->create($contentType)->parse($domElement);
            $data[] = $elements;
        }

        return $data;
    }
}

