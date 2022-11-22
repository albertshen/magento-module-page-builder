<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\Attribute;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Media implements \AlbertMage\PageBuilder\Model\Dom\AttributeInterface
{

    /**
     * @var \AlbertMage\PageBuilder\Model\Directive\Filter
     */
    protected $filter;

    /**
     * @param \AlbertMage\PageBuilder\Model\Directive\Filter
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\Directive\Filter $filter
    )
    {
        $this->filter = $filter;
    }

    /**
     * Parse Directive
     *
     * @return mixed
     * @throws LocalizedException
     */
    public function parse($string) 
    {
       return $this->filter->filter($string);
    }

}
