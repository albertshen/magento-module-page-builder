<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

/**
 *
 * @api
 * @since 100.0.2
 */
class Image extends \AlbertMage\PageBuilder\Model\Dom\Element
{

    /**
     * @var \AlbertMage\PageBuilder\Model\ResourceInterface
     */
    protected $resource;

    /**
     * @param \AlbertMage\PageBuilder\Model\Dom\ElementPool
     * @param \AlbertMage\PageBuilder\Model\Dom\HrefElement
     * @param array
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\ResourceInterface $resource,
        \AlbertMage\PageBuilder\Model\Dom\ElementPool $elementPool,
        \AlbertMage\PageBuilder\Model\Dom\HrefElement $hrefElement,
        array $attributes = []
    )
    {
        $this->resource = $resource;
        parent::__construct(
            $elementPool,
            $hrefElement,
            $attributes
        );
    }

    /**
     * Parse Dom
     *
     * @return array
     * @throws LocalizedException
     */
    public function parse($domElement): array
    {

        $data = [];
        $data[$this->getFieldName('data-content-type')] = $domElement->getAttribute('data-content-type');
        $data[$this->getFieldName('data-appearance')] = $domElement->getAttribute('data-appearance');
        if ($domElement->childNodes[0]->tagName === 'a') {
            $data['link'] = $this->hrefElement->parse($domElement->childNodes[0]);
            $childNodes = $domElement->childNodes[0]->childNodes;
        } else {
            $childNodes = $domElement->childNodes->childNodes;
        }

        $images = [];
        foreach ($childNodes as $node) {
            $images[$node->getAttribute('data-element')] = [
                'src' => $node->getAttribute('src'),
                'title' => $node->getAttribute('title'),
                'alt' => $node->getAttribute('alt')
            ];
        }
        $data = array_merge($data, $this->resource->process($images));

        return $data;
    }

}
