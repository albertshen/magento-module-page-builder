<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Link;

/**
 *
 */
class AppProvider extends AbstractProvider
{

    /**
     * @inheritDoc
     */
    public function getPath(int $id, string $entityType)
    {
        if (isset($this->config['routePattern'][$entityType])) {
            return str_replace(':id', $id, $this->config['routePattern'][$entityType]);
        }
        return $entityType . '/' . $id;
    }
}