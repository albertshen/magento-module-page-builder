<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\DataObject;
use AlbertMage\PageBuilder\Api\Data\TabHeaderInterface;

/**
 * TabHeader
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class TabHeader extends DataObject implements TabHeaderInterface
{

    /**
     * Get title
     *
     * @return string|null Title. Otherwise, null.
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Set title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

}
