<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
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
