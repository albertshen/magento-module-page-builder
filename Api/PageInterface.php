<?php 
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api;
 
/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface PageInterface {


    /**
     * Retrieve page.
     *
     * @param int $pageId
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getPage($pageId);


}