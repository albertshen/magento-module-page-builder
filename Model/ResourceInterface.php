<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model;

interface ResourceInterface
{
    const RESPONSIVE = 'responsive';

    const MOBILE = 'mobile';
    
    /**
     * Get specific parser class by given content type
     *
     * @param array $resources
     * @return mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function process($resources);
}
