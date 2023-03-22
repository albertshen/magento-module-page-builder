<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api\Data;

/**
 * Interface Image
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface ImageInterface
{

    const SRC = 'src';

    const DESKTOP_SRC = 'desktop_src';

    const MOBILE_SRC = 'mobile_src';

    const TITLE = 'title';

    const ALT = 'alt';

    const LINK = 'link';

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
     * Get desktop src
     *
     * @return string|null Desktop src. Otherwise, null.
     */
    public function getDesktopSrc();

    /**
     * Set desktop src
     *
     * @param string $desktopSrc
     * @return $this
     */
    public function setDesktopSrc($desktopSrc);

    /**
     * Get mobile src
     *
     * @return string|null Mobile src. Otherwise, null.
     */
    public function getMobileSrc();

    /**
     * Set mobile src
     *
     * @param string $mobileSrc
     * @return $this
     */
    public function setMobileSrc($mobileSrc);

    /**
     * Get title
     *
     * @return string|null Title. Otherwise, null.
     */
    public function getTitle();

    /**
     * Set title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Get alt
     *
     * @return string|null Alt. Otherwise, null.
     */
    public function getAlt();

    /**
     * Set alt
     *
     * @param string $alt
     * @return $this
     */
    public function setAlt($alt);

    /**
     * Get link
     *
     * @return \AlbertMage\PageBuilder\Api\Data\LinkInterface|null Link. Otherwise, null.
     */
    public function getLink();

    /**
     * Set link
     *
     * @param \AlbertMage\PageBuilder\Api\Data\LinkInterface $link
     * @return $this
     */
    public function setLink($link);

}
