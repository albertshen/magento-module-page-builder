<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api\Data;

/**
 * Interface Content
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface ContentInterface
{

    const TYPE = 'type';

    const VALUE = 'value';

    const IMAGE = 'image';

    const LINK = 'link';

    const WIDGET = 'widget';

    /**
     * Get type
     *
     * @return string
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
     * Get value
     *
     * @return string|null Value. Otherwise, null.
     */
    public function getValue();

    /**
     * Set value
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value);

    /**
     * Get image
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ImageInterface|null Image. Otherwise, null.
     */
    public function getImage();

    /**
     * Set image
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ImageInterface $image
     * @return $this
     */
    public function setImage($image);

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

    /**
     * Get widget
     *
     * @return \AlbertMage\PageBuilder\Api\Data\WidgetInterface|null Widget. Otherwise, null.
     */
    public function getWidget();

    /**
     * Set widget
     *
     * @param \AlbertMage\PageBuilder\Api\Data\WidgetInterface $widget
     * @return $this
     */
    public function setWidget($widget);

}
