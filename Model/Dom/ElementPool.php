<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom;

use Magento\Framework\App\ObjectManager;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class ElementPool
{
    /**
     * @var array
     */
    private $elementClassCollection;

    /**
     * @param array
     */
    public function __construct(array $elementClassCollection)
    {
        $this->elementClassCollection = $elementClassCollection;
    }

    /**
     * Get specific parser class by given content type
     *
     * @param string $contentType
     * @return ElementInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function create($contentType)
    {
        if (isset($this->elementClassCollection[$contentType])) {
            $element = ObjectManager::getInstance()->create($this->elementClassCollection[$contentType]);
            if (!$element instanceof ElementInterface) {
                throw new \InvalidArgumentException(
                    __('Dom parser should be an instance of ElementInterface.')
                );
            }
            return $element;
        }

        throw new \Magento\Framework\Exception\LocalizedException(
            __('There is no content type for given type' . $contentType)
        );
    }
}
