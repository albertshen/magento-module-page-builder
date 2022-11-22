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
     * @return array
     * @throws LocalizedException
     */
    public function parse($domElement): array
    {

        $data = [];
        $data[$this->getFieldName('data-content-type')] = $domElement->getAttribute('data-content-type');
        $data[$this->getFieldName('data-appearance')] = $domElement->getAttribute('data-appearance');
        $data['heading'] = $domElement->tagName;

        return $data;
    }

}
