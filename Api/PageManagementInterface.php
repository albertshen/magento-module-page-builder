<?php 
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api;
 
/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface PageManagementInterface {


    /**
     * Retrieve page.
     *
     * @param string $pageId
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface[]
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getPage($pageId);


}