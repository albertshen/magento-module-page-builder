<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\DataObject;
use AlbertMage\PageBuilder\Api\Data\LinkInterface;

/**
 * Link
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Link extends DataObject implements LinkInterface
{

    /**
     * Get type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->getData(self::TYPE);
    }

    /**
     * Set type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        return $this->setData(self::TYPE, $type);
    }

    /**
     * Get url
     *
     * @return string Url. Otherwise, null.
     */
    public function getUrl()
    {
        return $this->getData(self::URL);
    }

    /**
     * Set url
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        return $this->setData(self::URL, $url);
    }

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

    /**
     * Get id
     *
     * @return string|null Id. Otherwise, null.
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set id
     *
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get target
     *
     * @return string|null Target. Otherwise, null.
     */
    public function getTarget()
    {
        return $this->getData(self::TARGET);
    }

    /**
     * Set target
     *
     * @param string $target
     * @return $this
     */
    public function setTarget($target)
    {
        return $this->setData(self::TARGET, $target);
    }

    /**
     * Get anchor text
     *
     * @return string|null Anchor text. Otherwise, null.
     */
    public function getAnchorText()
    {
        return $this->getData(self::ANCHOR_TEXT);
    }

    /**
     * Set anchor text
     *
     * @param string $anchorText
     * @return $this
     */
    public function setAnchorText($anchorText)
    {
        return $this->setData(self::ANCHOR_TEXT, $anchorText);
    }

}
