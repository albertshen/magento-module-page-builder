<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\DataObject;
use AlbertMage\PageBuilder\Api\Data\VideoInterface;

/**
 * Video
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Video extends DataObject implements VideoInterface
{

    /**
     * Get src
     *
     * @return string|null Src. Otherwise, null.
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
     * Get loop
     *
     * @return bool|null loop. Otherwise, null.
     */
    public function getLoop()
    {
        return $this->getData(self::LOOP);
    }

    /**
     * Set loop
     *
     * @param bool $loop
     * @return $this
     */
    public function setLoop($loop)
    {
        return $this->setData(self::LOOP, $loop);
    }

    /**
     * Get autoplay
     *
     * @return bool|null autoplay. Otherwise, null.
     */
    public function getAutoplay()
    {
        return $this->getData(self::AUTOPLAY);
    }

    /**
     * Set autoplay
     *
     * @param bool $autoplay
     * @return $this
     */
    public function setAutoplay($autoplay)
    {
        return $this->setData(self::AUTOPLAY, $autoplay);
    }

    /**
     * Get muted
     *
     * @return bool|null Muted. Otherwise, null.
     */
    public function getMuted()
    {
        return $this->getData(self::MUTED);
    }

    /**
     * Set muted
     *
     * @param bool $muted
     * @return $this
     */
    public function setMuted($muted)
    {
        return $this->setData(self::MUTED, $muted);
    }

    /**
     * Get play only visible
     *
     * @return bool|null play only visible. Otherwise, null.
     */
    public function getPlayOnlyVisible()
    {
        return $this->getData(self::PALY_ONLY_VISIBLE);
    }

    /**
     * Set play only visible
     *
     * @param bool $playOnlyVisible
     * @return $this
     */
    public function setPlayOnlyVisible($playOnlyVisible)
    {
        return $this->setData(self::PALY_ONLY_VISIBLE, $playOnlyVisible);
    }

    /**
     * Get lazy load
     *
     * @return bool|null lazy load. Otherwise, null.
     */
    public function getLazyLoad()
    {
        return $this->getData(self::LAZY_LOAD);
    }

    /**
     * Set lazy load
     *
     * @param bool $lazyLoad
     * @return $this
     */
    public function setLazyLoad($lazyLoad)
    {
        return $this->setData(self::LAZY_LOAD, $lazyLoad);
    }

    /**
     * Get fallback src
     *
     * @return string|null fallback src. Otherwise, null.
     */
    public function getFallbackSrc()
    {
        return $this->getData(self::FALLBACK_SRC);
    }

    /**
     * Set fallback src
     *
     * @param string $fallbackSrc
     * @return $this
     */
    public function setFallbackSrc($fallbackSrc)
    {
        return $this->setData(self::FALLBACK_SRC, $fallbackSrc);
    }

    /**
     * Get poster
     *
     * @return string|null poster. Otherwise, null.
     */
    public function getPoster()
    {
        return $this->getData(self::POSTER);
    }

    /**
     * Set poster
     *
     * @param string $poster
     * @return $this
     */
    public function setPoster($poster)
    {
        return $this->setData(self::POSTER, $poster);
    }
}
