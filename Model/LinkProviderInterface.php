<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model;

interface LinkProviderInterface
{
    /**
     * Generaget link or path for different store/app
     * 
     * @param int $id
     * @param string $entityType
     * @param array $params
     * @return string
     * @throws LocalizedException
     */
    public function generate(int $id, string $entityType, array $params = []) : string;

    /**
     * Set store
     * 
     * @param \Magento\Store\Model\Store $store
     * @return self
     * @throws LocalizedException
     */
    public function setStore(\Magento\Store\Model\Store $store);

    /**
     * Set store
     * @return \Magento\Store\Model\Store
     * @throws LocalizedException
     */
    public function getStore();

    /**
     * Prepare path using passed id path and return it
     *
     * @throws \RuntimeException
     * @return string|false if path was not found in url rewrites.
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function getPath(int $id, string $entityType);
}
