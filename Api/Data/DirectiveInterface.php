<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api\Data;

/**
 * Interface Directive
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface DirectiveInterface
{

    const TYPE = 'type';

    const WIDGET = 'widget';

    const URL = 'url';

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
    public function setWidget(\AlbertMage\PageBuilder\Api\Data\WidgetInterface $widget);

    /**
     * Get url
     *
     * @return string|null Url. Otherwise, null.
     */
    public function getUrl();

    /**
     * Set url
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url);

}
