<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Link;

use Magento\UrlRewrite\Service\V1\Data\UrlRewrite;
use Magento\UrlRewrite\Model\UrlFinderInterface;

/**
 *
 */
class HrefProvider implements \AlbertMage\PageBuilder\Model\LinkProviderInterface
{

    /**
     * @var array
     */
    private $config;

    /**
     * Url finder for category
     *
     * @var UrlFinderInterface
     */
    protected $urlFinder;

    /**
     * @param array
     */
    public function __construct(
        array $config,
        UrlFinderInterface $urlFinder
    )
    {
        $this->config = $config;
        $this->urlFinder = $urlFinder;
    }
    
    /**
     * @inheritDoc
     */
    public function generate(int $id, string $entityType, \Magento\Store\Model\Store $store) : string
    {
        if (isset($this->config['routePattern'][$entityType])) {
            return str_replace(':id', $id, $this->config['routePattern'][$entityType]);
        }
        return $this->getHref($id, $entityType, $store);
    }

    /**
     * Prepare url using passed id path and return it
     *
     * @throws \RuntimeException
     * @return string|false if path was not found in url rewrites.
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function getHref($id, $entityType, $store)
    {
        $entityType = $entityType === 'page' ? 'cms-page' : $entityType;
        $filterData = [
            UrlRewrite::ENTITY_ID => $id,
            UrlRewrite::ENTITY_TYPE => $entityType,
            UrlRewrite::STORE_ID => $store->getId(),
        ];

        $rewrite = $this->urlFinder->findOneByData($filterData);

        if ($rewrite) {
            $href = $store->getUrl('', ['_direct' => $rewrite->getRequestPath()]);
        }
        return $href;
    }

}