<?php 

namespace AlbertMage\PageBuilder\Api;
 
 
interface BlockInterface {


    /**
     * Retrieve block.
     *
     * @param string $blockId
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getBlock($blockId);


}