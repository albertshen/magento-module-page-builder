<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Resource\Image;

/**
 *
 * @api
 * @since 100.0.2
 */
class Mobile implements \AlbertMage\PageBuilder\Model\ResourceProviderInterface
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
     * Process Mobile resource
     * 
     * @param array
     * @return mixed
     */
    public function process($resources)
    {
        if (!empty($resources['mobile_image'])) {
            return $this->filter->filter($resources['mobile_image']);
        }
        if (!empty($resources['desktop_image'])) {
            return $this->filter->filter($resources['desktop_image']);
        }
    }

}
