<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\Attribute;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Boolean implements \AlbertMage\PageBuilder\Model\Dom\AttributeInterface
{

    /**
     * Parse Boolean
     *
     * @return string
     * @throws LocalizedException
     */
    public function parse($string) 
    {
       return $string == 'true' ? true : false;
    }

}
