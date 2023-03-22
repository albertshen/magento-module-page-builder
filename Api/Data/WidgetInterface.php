<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api\Data;

/**
 * Interface Widget
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface WidgetInterface
{

    const TYPE = 'type';

    const PRODUCTS = 'products';

    const LINK = 'link';

    const BLOCK = 'block';

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
     * Get products
     *
     * @return \AlbertMage\Catalog\Api\Data\ProductInterface[]|null Products. Otherwise, null.
     */
    public function getProducts();

    /**
     * Set products
     *
     * @param \AlbertMage\Catalog\Api\Data\ProductInterface[] $products
     * @return $this
     */
    public function setPorducts($products);

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
    public function setLink(\AlbertMage\PageBuilder\Api\Data\LinkInterface $link);

    /**
     * Get block
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface[]|null Block. Otherwise, null.
     */
    public function getBlock();

    /**
     * Set block
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ElementInterface[] $block
     * @return $this
     */
    public function setBlock($block);

}
