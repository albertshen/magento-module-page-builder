<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Widget;

interface BlockInterface
{

    /**
     * Get block
     *
     * @return array
     * @throws LocalizedException
     */
    public function getBlock() : array;

}