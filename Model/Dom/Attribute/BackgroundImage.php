<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\Attribute;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class BackgroundImage implements \AlbertMage\PageBuilder\Model\Dom\AttributeInterface
{

    /**
     * @var \AlbertMage\PageBuilder\Model\ResourceInterface
     */
    protected $resource;

    /**
     * @param \AlbertMage\PageBuilder\Model\ResourceInterface
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\ResourceInterface $resource
    )
    {
        $this->resource = $resource;
    }

    /**
     * Parse Directive
     *
     * @return mixed
     * @throws LocalizedException
     */
    public function parse($string) 
    {
        $resources = json_decode(stripslashes(htmlspecialchars_decode($string)), true);
        return $this->resource->process($resources);
    }

}
