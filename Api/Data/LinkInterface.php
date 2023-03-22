<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api\Data;

/**
 * Interface Link
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface LinkInterface
{

    const TYPE = 'type';

    const URL = 'url';

    const TITLE = 'title';

    const ID = 'id';

    const TARGET = 'target';

    const ANCHOR_TEXT = 'anchor_text';

    /**
     * Get type
     *
     * @return string|null
     */
    public function getType();

    /**
     * Set type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type);

    /**
     * Get url
     *
     * @return string Url. Otherwise, null.
     */
    public function getUrl();

    /**
     * Set url
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url);

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
     * Get id
     *
     * @return string|null Id. Otherwise, null.
     */
    public function getId();

    /**
     * Set id
     *
     * @param string $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get target
     *
     * @return string|null Target. Otherwise, null.
     */
    public function getTarget();

    /**
     * Set target
     *
     * @param string $target
     * @return $this
     */
    public function setTarget($target);

    /**
     * Get anchor text
     *
     * @return string|null Anchor text. Otherwise, null.
     */
    public function getAnchorText();

    /**
     * Set anchor text
     *
     * @param string $anchorText
     * @return $this
     */
    public function setAnchorText($anchorText);

}
