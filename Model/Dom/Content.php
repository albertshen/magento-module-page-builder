<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Content
{
    /**
     * @var \AlbertMage\PageBuilder\Model\Directive\Filter
     */
    protected $filter;

    /**
     * @var \AlbertMage\PageBuilder\Model\ContentFactory
     */
    protected $contentFactory;

    /**
     * @var \AlbertMage\PageBuilder\Model\ImageFactory
     */
    protected $imageFactory;

    /**
     * @var \AlbertMage\PageBuilder\Model\LinkFactory
     */
    protected $linkFactory;


    /**
     * @param \AlbertMage\PageBuilder\Model\Directive\Filter $filter
     * @param \AlbertMage\PageBuilder\Model\ContentFactory $contentFactory
     * @param \AlbertMage\PageBuilder\Model\ImageFactory $imageFactory
     * @param \AlbertMage\PageBuilder\Model\LinkFactory $linkFactory
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\Directive\Filter $filter,
        \AlbertMage\PageBuilder\Model\ContentFactory $contentFactory,
        \AlbertMage\PageBuilder\Model\ImageFactory $imageFactory,
        \AlbertMage\PageBuilder\Model\LinkFactory $linkFactory
    )
    {
        $this->filter = $filter;
        $this->contentFactory = $contentFactory;
        $this->imageFactory = $imageFactory;
        $this->linkFactory = $linkFactory;
    }

    /**
     * Parse Dom
     *
     * @param \DOMElement $domElement
     * @return \AlbertMage\PageBuilder\Api\Data\ContentInterface[]
     * @throws LocalizedException
     */
    public function parse(\DOMElement $domElement)
    {
        $contents = [];
        
        foreach ($domElement->childNodes as $childNode) {

            $content = $this->contentFactory->create();

            $this->doParse($content, $childNode);

            $contents[] = $content;
        }

        return $contents;
    }

    /**
     * Parse Dom
     * 
     * \AlbertMage\PageBuilder\Api\Data\ContentInterface
     * @param \DOMElement $domElement
     * @return \AlbertMage\PageBuilder\Api\Data\ContentInterface
     * @throws LocalizedException
     */
    public function doParse(
        \AlbertMage\PageBuilder\Api\Data\ContentInterface $content,
        \DOMElement $domElement
    ) {

        if ($domElement instanceof \DOMText) {
            $this->proccessText($content, $domElement->wholeText);
        } else {

            if (in_array($domElement->tagName, ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'])) {

                if ($domElement->hasChildNodes() && $domElement->firstChild instanceof \DOMElement) {
                    $this->doParse($content, $domElement->firstChild);
                } else {
                    $this->proccessText($content, $domElement->textContent);
                    if ('widget' != $content->getType()) {
                        $content->setType($domElement->tagName);
                    }
                }

            }

            if ('a' === $domElement->tagName) {
                $link = $this->linkFactory->create();
                $link->setUrl($domElement->getAttribute('href'));
                $content->setLink($link);
                if ($domElement->hasChildNodes() && $domElement->firstChild instanceof \DOMElement) {
                    $this->doParse($content, $domElement->firstChild);
                } else {
                    $content->setType('link');
                    $content->setValue($domElement->textContent);
                }
            }

            if ('img' === $domElement->tagName) {
                $image = $this->imageFactory->create();
                $image->setSrc($domElement->getAttribute('src'));
                $image->setAlt($domElement->getAttribute('alt'));
                $content->setType('image');
                $content->setImage($image);
                if ($domElement->hasChildNodes() && $domElement->firstChild instanceof \DOMElement) {
                    $this->doParse($content, $domElement->firstChild);
                }
            }
        }
    }

    /**
     * Proccess Text
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ContentInterface $content
     * @param string $wholeText
     * @throws LocalizedException
     */
    private function proccessText(
        \AlbertMage\PageBuilder\Api\Data\ContentInterface $content,
        string $wholeText
    ) {
        if ($widget = $this->filter->widgetFilter($wholeText)) {
            $content->setType('widget');
            $content->setWidget($widget);
        } else {
            $content->setType('text');
            $content->setValue($wholeText);
        }

    }
}