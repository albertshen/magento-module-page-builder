<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Dom\Attribute;

/**
 *
 * @api
 * @since 100.0.2
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
