<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Text extends \AlbertMage\PageBuilder\Model\Dom\Element
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
        $content = $this->content->parse($domElement);
        $elementData->setContent($content);
        $rawContent = '';
        foreach ($domElement->childNodes as $childNode) {
            $rawContent .= $childNode->ownerDocument->saveXML($childNode);
        }
        $elementData->setContentRaw($rawContent);
        return $elementData;
    }

}
