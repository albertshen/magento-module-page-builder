<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
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
        $href = $domElement->getAttribute('href');
        $linkType = $domElement->getAttribute('data-link-type');
        $data['type'] = $linkType;
        if ($linkType == 'default') {
            $data['url'] = $href;
        } else {
            $data = array_merge($data, $this->filter->filter($domElement->getAttribute('href')));
        }
        //unset($data['type']);
        return $data;
    }

}
