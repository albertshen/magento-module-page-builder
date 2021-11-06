<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace AlbertMage\PageBuilder\Model\Parser;

use Symfony\Component\DomCrawler\Crawler;

/**
 * @api
 * @since 100.0.2
 */
class Root
{

    /**
     * @var \AlbertMage\PageBuilder\Model\ParserPool
     */
    private $parserPool;

    /**
     * @param \AlbertMage\PageBuilder\Model\ParserPool
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\ParserPool $parserPool
    )
    {
        $this->parserPool = $parserPool;
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
            $domArray = $this->parserPool->create($contentType)->parse($domElement);
            $data[] = $domArray;
        }

        return $data;
    }
}
