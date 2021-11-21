<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Widget\Link;

use Magento\Framework\App\ObjectManager;

/**
 *
 */
class PageLink extends AbstractLink
{

    public function getLink() : array
    {
        $data = [];
        $data['type'] = 'link';
        if ($this->hasData('page_id')) {
            $data['url'] = $this->link->generate($this->getData('page_id'), 'page');
        }
        if ($this->hasData('anchor_text')) {
            $data['text'] = $this->getData('anchor_text');
        }
        if ($this->hasData('title')) {
            $data['title'] = $this->getData('title');
        }
        return $data;
    }

}