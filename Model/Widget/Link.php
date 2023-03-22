<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Widget;

use Magento\Framework\DataObject;
use AlbertMage\PageBuilder\Model\LinkFactory;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Link extends \Magento\Framework\DataObject implements \AlbertMage\PageBuilder\Model\Widget\LinkInterface
{

    /**
     * @var \AlbertMage\PageBuilder\Model\LinkFactory
     */
    protected $linkFactory;

    /**
     * @param \AlbertMage\PageBuilder\Model\LinkFactory $linkFactory
     * @param array
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\LinkFactory $linkFactory,
        array $params
    )
    {
        parent::__construct(
            $params
        );
        $this->linkFactory = $linkFactory;
    }

    /**
     * @inheritdoc
     */
    public function getLink()
    {

        $link = $this->linkFactory->create();

        if ($this->hasData('page_id')) {
            $link->setId($this->getData('page_id'));
            $link->setUrl('page/'.$this->getData('page_id'));
        }

        if ($this->hasData('id_path')) {
            $rewriteData = $this->parseIdPath($this->getData('id_path'));
            $link->setId($rewriteData[1]);
            $link->setUrl($rewriteData[0].'/'.$rewriteData[1]);
        }

        if ($this->hasData('title')) {
            $link->setTitle($this->getData('title'));
        }

        if ($this->hasData('anchor_text')) {
            $link->setAnchorText($this->getData('anchor_text'));
        }

        return $link;

    }

    /**
     * Parse id_path
     *
     * @param string $idPath
     * @throws \RuntimeException
     * @return array
     */
    private function parseIdPath($idPath)
    {
        $rewriteData = explode('/', $idPath);

        if (!isset($rewriteData[0]) || !isset($rewriteData[1])) {
            throw new \RuntimeException('Wrong id_path structure.');
        }
        return $rewriteData;
    }

}