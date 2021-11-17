<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Dom;

/**
 *
 * @api
 * @since 100.0.2
 */
class HrefElement
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
     * @return array
     * @throws LocalizedException
     */
    public function parse(\DOMElement $domElement) 
    {
        $data = [
            'target' => $domElement->getAttribute('target'),
            'title' => $domElement->getAttribute('title')
        ];
        $data = array_merge($data, $this->filter->filter($domElement->getAttribute('href')));
        unset($data['type_name']);
        return $data;
    }

}
