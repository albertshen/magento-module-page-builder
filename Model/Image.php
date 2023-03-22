<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\DataObject;
use AlbertMage\PageBuilder\Api\Data\ImageInterface;

/**
 * Image
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Image extends DataObject implements ImageInterface
{

    /**
     * Get src
     *
     * @return strin|null Src. Otherwise, null.
     */
    public function getSrc()
    {
        return $this->getData(self::SRC);
    }

    /**
     * Set src
     *
     * @param string $src
     * @return $this
     */
    public function setSrc($src)
    {
        return $this->setData(self::SRC, $src);
    }

    /**
     * Get desktop src
     *
     * @return string|null Desktop src. Otherwise, null.
     */
    public function getDesktopSrc()
    {
        return $this->getData(self::DESKTOP_SRC);
    }

    /**
     * Set desktop src
     *
     * @param string $desktopSrc
     * @return $this
     */
    public function setDesktopSrc($desktopSrc)
    {
        return $this->setData(self::DESKTOP_SRC, $desktopSrc);
    }

    /**
     * Get mobile src
     *
     * @return string|null Mobile src. Otherwise, null.
     */
    public function getMobileSrc()
    {
        return $this->getData(self::MOBILE_SRC);
    }

    /**
     * Set mobile src
     *
     * @param string $mobileSrc
     * @return $this
     */
    public function setMobileSrc($mobileSrc)
    {
        return $this->setData(self::MOBILE_SRC, $mobileSrc);
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
     * Get alt
     *
     * @return string|null Alt. Otherwise, null.
     */
    public function getAlt()
    {
        return $this->getData(self::ALT);
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return $this
     */
    public function setAlt($alt)
    {
        return $this->setData(self::ALT, $alt);
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

}
