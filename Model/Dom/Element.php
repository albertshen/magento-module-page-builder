<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom;

use \Magento\Framework\App\ObjectManager;
use \AlbertMage\PageBuilder\Model\ElementFactory;
use \AlbertMage\PageBuilder\Model\ImageFactory;
use \AlbertMage\PageBuilder\Model\Dom\LinkElement;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Element implements ElementInterface
{
    /**
     * @var \AlbertMage\PageBuilder\Model\Dom\ElementPool
     */
    protected $elementPool;

    /**
     * @var \AlbertMage\PageBuilder\Model\ElementFactory
     */
    protected $elementFactory;

    /**
     * @var \AlbertMage\PageBuilder\Model\ImageFactory
     */
    protected $imageFactory;

    /**
     * @var \AlbertMage\PageBuilder\Model\VideoFactory
     */
    protected $videoFactory;

    /**
     * @var \AlbertMage\PageBuilder\Model\Dom\LinkElement
     */
    protected $linkElement;

    /**
     * @var \AlbertMage\PageBuilder\Model\Dom\Content
     */
    protected $content;

    /**
     * @var \AlbertMage\PageBuilder\Model\Directive\Filter
     */
    protected $filter;

    /**
     * @var \AlbertMage\PageBuilder\Model\Processor
     */
    protected $processor;

    /**
     * @param \AlbertMage\PageBuilder\Model\Dom\ElementPool $elementPool
     * @param \AlbertMage\PageBuilder\Model\ElementFactory $elementFactory
     * @param \AlbertMage\PageBuilder\Model\ImageFactory $imageFactory
     * @param \AlbertMage\PageBuilder\Model\VideoFactory $videoFactory
     * @param \AlbertMage\PageBuilder\Model\Dom\LinkElement $linkElement
     * @param \AlbertMage\PageBuilder\Model\Dom\Content $content
     * @param \AlbertMage\PageBuilder\Model\Directive\Filter $filter
     * @param \AlbertMage\PageBuilder\Model\Processor $processor
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\Dom\ElementPool $elementPool,
        \AlbertMage\PageBuilder\Model\ElementFactory $elementFactory,
        \AlbertMage\PageBuilder\Model\ImageFactory $imageFactory,
        \AlbertMage\PageBuilder\Model\VideoFactory $videoFactory,
        \AlbertMage\PageBuilder\Model\Dom\LinkElement $linkElement,
        \AlbertMage\PageBuilder\Model\Dom\Content $content,
        \AlbertMage\PageBuilder\Model\Directive\Filter $filter,
        \AlbertMage\PageBuilder\Model\Processor $processor
    ) {
        $this->elementPool = $elementPool;
        $this->elementFactory = $elementFactory;
        $this->imageFactory = $imageFactory;
        $this->videoFactory = $videoFactory;
        $this->linkElement = $linkElement;
        $this->content = $content;
        $this->filter = $filter;
        $this->processor = $processor;
    }


    /**
     * Parse Dom
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface
     * @throws LocalizedException
     */
    public function parse(\DOMElement $domElement)
    {

        $elementData = $this->createElementByDom($domElement);

        $elements = [];
        foreach ($domElement->childNodes as $node) {
            $elements[] = $this->elementPool->create($node->getAttribute('data-content-type'))->parse($node);
        }
        $elementData->setElements($elements);

        return $elementData;
    }

    public function createElementByDom(\DOMElement $domElement) {

        $elementData = $this->elementFactory->create();

        $this->updateElementByDom($elementData, $domElement);

        return $elementData;
    }

    public function updateElementByDom(
        \AlbertMage\PageBuilder\Api\Data\ElementInterface $elementData,
        \DOMElement $domElement
    ) {

        foreach ($domElement->attributes as $item) {
            if (strpos($item->localName, 'data-') == 0) {
                $field = $this->getFieldName($item->localName);
                $value = $this->processor->processAttribute($field, $item->textContent);
                $elementData->setData($field, $value);
            }
        }

        return $elementData;
    }

    /**
     * Process Background
     * 
     * @param \DOMElement $domElement
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface
     * @throws LocalizedException
     */
    protected function parseSliderBannerElement(\DOMElement $domElement)
    {
        $elementData = $this->createElementByDom($domElement);

        $this->updateElementByDom($elementData, $domElement);

        if ('link' === $domElement->firstChild->getAttribute('data-element')) {
            $elementData->setLink($this->linkElement->parse($domElement->firstChild));
        }
        $wrapperElement = $domElement->firstChild->firstChild;

        $this->updateElementByDom($elementData, $wrapperElement);

        $this->processor->processBackgound($elementData);

        $overlayElement = $wrapperElement->firstChild;

        if ($overlayColor = $overlayElement->getAttribute('data-overlay-color')) {
            $elementData->setOverlayColor($overlayColor);
        }

        foreach($overlayElement->firstChild->childNodes as $item) {
            if ('content' == $item->getAttribute('data-element')) {
                if ($content = $this->content->parse($item)) {
                    $elementData->setContent($content);
                }
            }
            if ('button' == $item->getAttribute('data-element')) {
                $elementData->setButtonText($item->textContent);
            }
        }

        return $elementData;
    }

    protected function getFieldName(string $str): string 
    {
        $str = preg_replace('/^data-/i', '', $str);
        return $this->kebabToSnake($str);
    }

    /**
     * convert kebab-case to snake_case
     */
    protected function kebabToSnake(string $str): string
    {
        return str_replace(['-'], '_', $str);
    }

}
