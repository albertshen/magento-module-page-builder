<?php 
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api;
 
/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface BlockManagementInterface {


    /**
     * Retrieve block by blockIdentifier.
     *
     * @param string $blockIdentifier
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface[]
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getBlockByIdentifier(string $blockIdentifier);

    /**
     * Retrieve block by id.
     *
     * @param int $blockId
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface[]
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getBlockById(int $blockId);

}