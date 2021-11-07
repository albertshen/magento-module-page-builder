<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model\Parser\Attribute;

/**
 *
 * @api
 * @since 100.0.2
 */
class BackgroundImage implements \AlbertMage\PageBuilder\Api\AttributeParserInterface
{

    /**
     * Parse Directive
     *
     * @return mixed
     * @throws LocalizedException
     */
    public function parse($string)
    {
        return json_decode(stripslashes(htmlspecialchars_decode($string)), true);
    }

}
