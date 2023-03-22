<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Slide extends \AlbertMage\PageBuilder\Model\Dom\Element
{
    /**
     * Parse Dom
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface
     * @throws LocalizedException
     */
    public function parse(\DOMElement $domElement)
    {
        return $this->parseSliderBannerElement($domElement);
    }
}