<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Heading extends \AlbertMage\PageBuilder\Model\Dom\Element
{

    /**
     * Parse Dom
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface
     * @throws LocalizedException
     */
    public function parse($domElement)
    {
        $elementData = $this->createElementByDom($domElement);
        $elementData->setText($domElement->textContent);
        return $elementData;
    }


}
