<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Api;

interface LinkProviderInterface
{
    /**
     * Generaget link or path for different app
     *
     * @return string
     * @throws LocalizedException
     */
    public function generate($string) : string;
}
