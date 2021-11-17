<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Widget;

interface LinkInterface
{

    /**
     * 
     */
    const LINK_TYPE = 'link';

    /**
     * Generaget link or path for different app
     *
     * @return array
     * @throws LocalizedException
     */
    public function getLink() : array;

}