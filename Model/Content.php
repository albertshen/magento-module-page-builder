<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\DataObject;
use AlbertMage\PageBuilder\Api\Data\ContentInterface;

/**
 * Content
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Content extends DataObject implements ContentInterface
{

    /**
     * Get type
     *
     * @return string
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
     * Get value
     *
     * @return string|null Value. Otherwise, null.
     */
    public function getValue()
    {
        return $this->getData(self::VALUE);
    }

    /**
     * Set value
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        return $this->setData(self::VALUE, $value);
    }

    /**
     * Get image
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ImageInterface|null Image. Otherwise, null.
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * Set image
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ImageInterface $image
     * @return $this
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Get link
     *
     * @return \AlbertMage\PageBuilder\Api\Data\LinkInterface|null Link. Otherwise, null.
     */
    public function getLink()
    {
        return $this->getData(self::LINK);
    }

    /**
     * Set link
     *
     * @param \AlbertMage\PageBuilder\Api\Data\LinkInterface $link
     * @return $this
     */
    public function setLink($link)
    {
        return $this->setData(self::LINK, $link);
    }

    /**
     * Get widget
     *
     * @return \AlbertMage\PageBuilder\Api\Data\WidgetInterface|null Widget. Otherwise, null.
     */
    public function getWidget()
    {
        return $this->getData(self::WIDGET);
    }

    /**
     * Set widget
     *
     * @param \AlbertMage\PageBuilder\Api\Data\WidgetInterface $widget
     * @return $this
     */
    public function setWidget($widget)
    {
        return $this->setData(self::WIDGET, $widget);
    }

}
