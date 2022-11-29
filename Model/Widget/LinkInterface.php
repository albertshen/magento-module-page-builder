<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Widget;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface LinkInterface
{
    
    const TYPE = 'link';

    /**
     * Generaget link or path for different app
     *
     * @return array
     * @throws LocalizedException
     */
    public function getLink() : array;

    /**
     * Get link data.
     *
     * @return \Magento\Framework\DataObject
     */
    public function getLinkData();
}