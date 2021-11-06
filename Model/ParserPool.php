<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\App\ObjectManager;
use AlbertMage\PageBuilder\Api\ParserInterface;

/**
 * Class aggregate all Media Gallery Entry Converters
 *
 * @api
 * @since 100.0.2
 */
class ParserPool
{
    /**
     * @var string
     */
    private $parserClassCollection;

    /**
     * @param array
     */
    public function __construct(array $parserClassCollection)
    {
        $this->parserClassCollection = $parserClassCollection;
    }

    /**
     * Get specific parser class by given content type
     *
     * @param string $contentType
     * @return ParserInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function create($contentType)
    {
        if (isset($this->parserClassCollection[$contentType])) {
            $parser = ObjectManager::getInstance()->create($this->parserClassCollection[$contentType]);
            if (!$parser instanceof ParserInterface) {
                throw new \InvalidArgumentException(
                    __('Dom parser should be an instance of ParserInterface.')
                );
            }
            return $parser;
        }

        throw new \Magento\Framework\Exception\LocalizedException(
            __('There is no content type for given type')
        );
    }
}
