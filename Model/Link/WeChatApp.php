<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Link;

/**
 *
 */
class WeChatApp implements \AlbertMage\PageBuilder\Api\LinkProviderInterface
{

    /**
     * Generate link or path for diferent store
     *
     * @return string
     */
    public function generate($link): string
    {
        return $link.'-wxapp';
    }
}