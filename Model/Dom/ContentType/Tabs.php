<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom\ContentType;

use \Magento\Framework\App\ObjectManager;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Tabs extends \AlbertMage\PageBuilder\Model\Dom\Element
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

        foreach ($domElement->childNodes as $childNode) {
            if ('navigation' == $childNode->getAttribute('data-element')) {
                $tabHeaders = [];
                foreach ($childNode->childNodes as $navChildNode) {
                    $tabHeader = ObjectManager::getInstance()->get(\AlbertMage\PageBuilder\Api\Data\TabHeaderInterface::class);
                    $tabHeader->setTitle($navChildNode->firstChild->firstChild->firstChild->wholeText);
                    $tabHeaders[] = $tabHeader;
                }
                $elementData->setTabHeader($tabHeaders);
            }
            if ('content' == $childNode->getAttribute('data-element')) {
                $tabItems = [];
                foreach ($childNode->childNodes as $contentChildNode) {
                    $contentType = $contentChildNode->getAttribute('data-content-type');
                    $tabItems[] = $this->elementPool->create($contentType)->parse($contentChildNode);
                }
                $elementData->setTabItems($tabItems);
            }
        }

        return $elementData;
    }

}