<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\DataObject;
use AlbertMage\PageBuilder\Api\Data\WidgetInterface;

/**
 * Widget
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Widget extends DataObject implements WidgetInterface
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
     * Get products
     *
     * @return \AlbertMage\Catalog\Api\Data\ProductInterface[]|null Products. Otherwise, null.
     */
    public function getProducts()
    {
        return $this->getData(self::PRODUCTS);
    }

    /**
     * Set products
     *
     * @param \AlbertMage\Catalog\Api\Data\ProductInterface[] $products
     * @return $this
     */
    public function setPorducts($products)
    {
        return $this->setData(self::PRODUCTS, $products);
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
    public function setLink(\AlbertMage\PageBuilder\Api\Data\LinkInterface $link)
    {
        return $this->setData(self::LINK, $link);
    }

    /**
     * Get block
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface[]|null Block. Otherwise, null.
     */
    public function getBlock()
    {
        return $this->getData(self::BLOCK);
    }

    /**
     * Set block
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ElementInterface[] $block
     * @return $this
     */
    public function setBlock($block)
    {
        return $this->setData(self::BLOCK, $block);
    }

}
