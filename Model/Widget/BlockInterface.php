<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Widget;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
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