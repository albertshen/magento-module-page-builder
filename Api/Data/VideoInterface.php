<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api\Data;

/**
 * Interface Video
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface VideoInterface
{

    const SRC = 'src';

    const LOOP = 'loop';

    const AUTOPLAY = 'autoplay';

    const MUTED = 'muted';

    const PALY_ONLY_VISIBLE = 'play_only_visible';

    const LAZY_LOAD = 'lazy_load';

    const FALLBACK_SRC = 'fallback_src';

    const POSTER = 'poster';

    /**
     * Get src
     *
     * @return string|null Src. Otherwise, null.
     */
    public function getSrc();

    /**
     * Set src
     *
     * @param string $src
     * @return $this
     */
    public function setSrc($src);

    /**
     * Get loop
     *
     * @return bool|null loop. Otherwise, null.
     */
    public function getLoop();

    /**
     * Set loop
     *
     * @param bool $loop
     * @return $this
     */
    public function setLoop($loop);

    /**
     * Get autoplay
     *
     * @return bool|null autoplay. Otherwise, null.
     */
    public function getAutoplay();

    /**
     * Set autoplay
     *
     * @param bool $autoplay
     * @return $this
     */
    public function setAutoplay($autoplay);

    /**
     * Get muted
     *
     * @return bool|null Muted. Otherwise, null.
     */
    public function getMuted();

    /**
     * Set muted
     *
     * @param bool $muted
     * @return $this
     */
    public function setMuted($muted);

    /**
     * Get play only visible
     *
     * @return bool|null play only visible. Otherwise, null.
     */
    public function getPlayOnlyVisible();

    /**
     * Set play only visible
     *
     * @param bool $playOnlyVisible
     * @return $this
     */
    public function setPlayOnlyVisible($playOnlyVisible);

    /**
     * Get lazy load
     *
     * @return bool|null lazy load. Otherwise, null.
     */
    public function getLazyLoad();

    /**
     * Set lazy load
     *
     * @param bool $lazyLoad
     * @return $this
     */
    public function setLazyLoad($lazyLoad);

    /**
     * Get fallback src
     *
     * @return string|null fallback src. Otherwise, null.
     */
    public function getFallbackSrc();

    /**
     * Set fallback src
     *
     * @param string $fallbackSrc
     * @return $this
     */
    public function setFallbackSrc($fallbackSrc);

    /**
     * Get poster
     *
     * @return string|null poster. Otherwise, null.
     */
    public function getPoster();

    /**
     * Set poster
     *
     * @param string $poster
     * @return $this
     */
    public function setPoster($poster);

}
