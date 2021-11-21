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
class CategoryLink extends AbstractLink
{

    public function getLink() : array
    {
        $data = [];
        $data['type'] = self::LINK_TYPE;
        if ($this->hasData('id_path')) {
            $rewriteData = $this->parseIdPath($this->getData('id_path'));
            $data['url'] = $this->link->generate($rewriteData[1], $rewriteData[0]);
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