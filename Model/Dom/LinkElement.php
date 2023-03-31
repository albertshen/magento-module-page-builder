<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Dom;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class LinkElement
{

    /**
     * @var \AlbertMage\PageBuilder\Model\Directive\Filter
     */
    protected $filter;

    /**
     * @var \AlbertMage\PageBuilder\Model\LinkFactory
     */
    protected $linkFactory;

    /**
     * @param \AlbertMage\PageBuilder\Model\Directive\Filter
     * @param \AlbertMage\PageBuilder\Model\LinkFactory $linkFactory
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\Directive\Filter $filter,
        \AlbertMage\PageBuilder\Model\LinkFactory $linkFactory
    )
    {
        $this->filter = $filter;
        $this->linkFactory = $linkFactory;
    }

    /**
     * Parse Directive
     *
     * @return \AlbertMage\PageBuilder\Api\Data\LinkInterface
     * @throws LocalizedException
     */
    public function parse(\DOMElement $domElement)
    {

        $linkType = $domElement->getAttribute('data-link-type');
        
        $href = $domElement->getAttribute('href');

        if ($linkType == 'default') {
            $link = $this->linkFactory->create();
            $link->setUrl($href);
        } else {

            $directive = $this->filter->filter($href);
            $link = $directive->getWidget()->getLink();
            if ($domElement->getAttribute('title')) {
                $link->setTitle($domElement->getAttribute('title')); 
            }
            if ($domElement->getAttribute('target')) {
                $link->setTarget($domElement->getAttribute('target'));
            }
            $link->setType($linkType);
        }

        return $link;
    }

}
