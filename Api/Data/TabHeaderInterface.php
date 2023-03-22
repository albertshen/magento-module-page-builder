<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api\Data;

/**
 * Interface TabHeader
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface TabHeaderInterface
{

    const TITLE = 'title';

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

}
