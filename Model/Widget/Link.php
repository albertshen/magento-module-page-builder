<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Widget;

use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\DataObject;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Link extends \Magento\Framework\DataObject implements \AlbertMage\PageBuilder\Model\Widget\LinkInterface
{

    /**
     * Application Event Dispatcher
     *
     * @var ManagerInterface
     */
    protected $eventManager;
    
    /**
     * @param ManagerInterface
     * @param array
     */
    public function __construct(
        ManagerInterface $eventManager,
        array $params
    )
    {
        $this->eventManager = $eventManager;
        parent::__construct(
            $params
        );
    }

    /**
     * @inheritdoc
     */
    public function getLink() : array
    {
        return $this->getLinkData()->getData();
    }

    /**
     * Get link data object
     *
     * @throws \RuntimeException
     * @return \Magento\Framework\DataObject\DataObject
     */
    public function getLinkData()
    {
        if ($this->hasData('page_id')) {
            $this->setEntityId($this->getData('page_id'));
            $this->setEntityType('page');
        }

        if ($this->hasData('id_path')) {
            $rewriteData = $this->parseIdPath($this->getData('id_path'));
            $this->setEntityId($rewriteData[1]);
            $this->setEntityType($rewriteData[0]);
        }

        $dataObject = new DataObject([
            'id' => $this->getEntityId(),
            'url' => $this->getEntityType().'/'.$this->getEntityId()
        ]);

        if ($this->hasData('anchor_text')) {
            $dataObject->setText($this->getData('anchor_text'));
        }
        if ($this->hasData('title')) {
            $dataObject->setTitle($this->getData('title'));
        }
        return $dataObject;
    }

    /**
     * Parse id_path
     *
     * @param string $idPath
     * @throws \RuntimeException
     * @return array
     */
    protected function parseIdPath($idPath)
    {
        $rewriteData = explode('/', $idPath);

        if (!isset($rewriteData[0]) || !isset($rewriteData[1])) {
            throw new \RuntimeException('Wrong id_path structure.');
        }
        return $rewriteData;
    }

}