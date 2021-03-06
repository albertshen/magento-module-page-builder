<?php 

namespace AlbertMage\PageBuilder\Api;
 
 
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