<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Link;

/**
 *
 */
class AppProvider implements \AlbertMage\PageBuilder\Model\LinkProviderInterface
{

    /**
     * @var array
     */
    private $config;

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
    public function generate($id, $entityType, $store): string
    {
        if (isset($this->config['routePattern'][$entityType])) {
            return str_replace(':id', $id, $this->config['routePattern'][$entityType]);
        }
        return $entityType . '/' . $id;
    }

}