<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface AttributeInterface
{
    /**
     * Parse Directive
     *
     * @return mixed
     * @throws LocalizedException
     */
    public function parse($string);
}
