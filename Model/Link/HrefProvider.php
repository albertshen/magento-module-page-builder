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
class HrefProvider extends AbstractProvider
{

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
        $this->urlFinder = $urlFinder;
        parent::__construct(
            $config
        );
    }

    /**
     * Prepare path using passed id path and return it
     *
     * @throws \RuntimeException
     * @return string|false if path was not found in url rewrites.
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function getPath(int $id, string $entityType)
    {
        $entityType = $entityType === 'page' ? 'cms-page' : $entityType;
        $filterData = [
            UrlRewrite::ENTITY_ID => $id,
            UrlRewrite::ENTITY_TYPE => $entityType,
            UrlRewrite::STORE_ID => $this->getStore()->getId(),
        ];

        $rewrite = $this->urlFinder->findOneByData($filterData);
        if ($rewrite) {
            return $rewrite->getRequestPath();
        }
        return '';
    }


}