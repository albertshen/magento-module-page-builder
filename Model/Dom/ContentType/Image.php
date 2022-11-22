<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
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
        if ($domElement->firstChild->tagName === 'a') {
            $data['link'] = $this->hrefElement->parse($domElement->firstChild);
            $childNodes = $domElement->firstChild->childNodes;
        } else {
            $childNodes = $domElement->childNodes;
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
