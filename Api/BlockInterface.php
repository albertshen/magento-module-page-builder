<?php 
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api;
 
/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
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