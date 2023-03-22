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
     * Parse Dom
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface
     * @throws LocalizedException
     */
    public function parse(\DOMElement $domElement)
    {
        $elementData = $this->createElementByDom($domElement);

        if ('link' === $domElement->firstChild->getAttribute('data-element')) {
            $elementData->setLink($this->linkElement->parse($domElement->firstChild));
            $childNodes = $domElement->firstChild->childNodes;
        } else {
            $childNodes = $domElement->childNodes;
        }

        $image = $this->imageFactory->create();

        foreach ($childNodes as $node) {
            $src = $this->filter->mediaFilter($node->getAttribute('src'));
            if ('desktop_image' == $node->getAttribute('data-element')) {
                $image->setDesktopSrc($src); 
            }
            if ('mobile_image' == $node->getAttribute('data-element')) {
                $image->setMobileSrc($src); 
            }
            if ($node->getAttribute('title')) {
                $image->setTitle($node->getAttribute('title'));
            }
            if ($node->getAttribute('alt')) {
                $image->setAlt($node->getAttribute('alt'));
            }
        }

        $this->processor->processImage($image);

        $elementData->setImage($image);

        return $elementData;
    }

}
