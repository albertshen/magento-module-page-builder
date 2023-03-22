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

    /**
     * Generaget link
     *
     * @return \AlbertMage\PageBuilder\Api\Data\LinkInterface
     * @throws LocalizedException
     */
    public function getLink();

}