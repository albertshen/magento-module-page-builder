<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Dom;

/**
 *
 */
class Content
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
     * Parse Dom
     *
     * @return array
     * @throws LocalizedException
     */
    public function parse(\DOMElement $domElement): array
    {
        $data = [];
        foreach ($domElement->childNodes as $childNode) {
            if ($childNode instanceof \DOMText) {
                $data = array_merge($data, $this->filter->contentFilter($childNode->wholeText));
            } else {
                if ($childNode->tagName === 'img') {
                    array_push($data, [
                        'type' => 'image',
                        'image' => [
                            'src' => $this->filter->filter($childNode->getAttribute('src')),
                            'alt' => $childNode->getAttribute('alt')
                        ]
                    ]);
                } 
            }
        }
        return $data;
    }
}
