<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Row extends \AlbertMage\PageBuilder\Model\Dom\Element
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

        $elementData = $this->updateElementByDom($elementData, $domElement->childNodes[0]);
        
        $this->processor->processBackgound($elementData);

        $elements = [];
        foreach ($domElement->childNodes[0]->childNodes as $node) {
            $elements[] = $this->elementPool->create($node->getAttribute('data-content-type'))->parse($node);
        }
        $elementData->setElements($elements);
        
        return $elementData;
    }


}
