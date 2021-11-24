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
class Tabs extends \AlbertMage\PageBuilder\Model\Dom\Element
{

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
        $data[$this->getFieldName('data-active-tab')] = $domElement->getAttribute('data-active-tab');

        foreach ($domElement->childNodes as $childNode) {
            if ($childNode->getAttribute('data-element') === 'navigation') {
                foreach ($childNode->childNodes as $navChildNode) {
                    $data[$this->getFieldName($childNode->getAttribute('data-element'))][] = $navChildNode->firstChild->firstChild->firstChild->wholeText;
                }
            }
            if ($childNode->getAttribute('data-element') === 'content') {
                foreach ($childNode->childNodes as $contentChildNode) {
                    $contentType = $contentChildNode->getAttribute('data-content-type');
                    $data[$this->getFieldName($childNode->getAttribute('data-element'))][] = $this->elementPool->create($contentType)->parse($contentChildNode);
                }
            }
        }

        return $data;
    }

}