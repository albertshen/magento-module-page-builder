<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model;

interface LinkInterface
{
    /**
     * Generaget link or path for different app
     *
     * @return string
     * @throws LocalizedException
     */
    public function generate($id, $entityType, $params = []) : string;
}
