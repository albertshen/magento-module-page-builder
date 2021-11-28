<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Link;

/**
 *
 */
abstract class AbstractProvider implements \AlbertMage\PageBuilder\Model\LinkProviderInterface
{

    /**
     * @var array
     */
    protected $config;

    /**
     * @var \Magento\Store\Model\Store $store
     */
    protected $store;

    /**
     * @param array
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function generate(int $id, string $entityType, array $params = []) : string
    {
        $absolute = $this->config['absolute'] ?? false;
        if ($path = $this->getPath($id, $entityType)) {

            if (empty($params) && !$absolute) {
                return $path;
            }
            
            $url = $this->getStore()->getUrl('', array_merge(['_direct' => $path], $params));
            if (isset($this->config['absolute']) && $this->config['absolute']) {
                return $url;
            }
            return str_replace($this->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_WEB), '', $url);
        }
        return '';
    }

    /**
     * @inheritDoc
     */
    public function setStore(\Magento\Store\Model\Store $store)
    {
        $this->store = $store;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStore()
    {
        return $this->store;
    }
}