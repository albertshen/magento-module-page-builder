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
class Responsive implements \AlbertMage\PageBuilder\Model\ResourceProviderInterface
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
     * Process Responsive resource
     * 
     * @param array
     * @return mixed
     */
    public function process($resources)
    {
        $data = [];
        foreach ($resources as $key => $widget) {
            $data[$key] = $this->filter->filter($widget);
        }
        return $data;
    }

}
