<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Video extends \AlbertMage\PageBuilder\Model\Dom\Element
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

        $videoElement = $domElement->firstChild->firstChild->firstChild->firstChild;

        $video = $this->videoFactory->create();
        $video->setSrc($this->filter->mediaFilter($videoElement->getAttribute('src')));
        $video->setAutoplay($videoElement->getAttribute('autoplay'));
        $video->setMuted($videoElement->getAttribute('muted'));

        $elementData->setVideo($video);
        
        return $elementData;
    }

}
