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
     * @return string
     * @throws LocalizedException
     */
    public function generate(int $id, string $entityType, \Magento\Store\Model\Store $store) : string;
}
