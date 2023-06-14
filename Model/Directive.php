<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\DataObject;
use AlbertMage\PageBuilder\Api\Data\DirectiveInterface;

/**
 * Directive
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Directive extends DataObject implements DirectiveInterface
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
    public function setWidget(\AlbertMage\PageBuilder\Api\Data\WidgetInterface $widget)
    {
        return $this->setData(self::WIDGET, $widget);
    }

    /**
     * Get url
     *
     * @return string|null Url. Otherwise, null.
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
}
