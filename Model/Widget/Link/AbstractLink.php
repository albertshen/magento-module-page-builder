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
abstract class AbstractLink extends \Magento\Framework\DataObject implements \AlbertMage\PageBuilder\Model\Widget\LinkInterface
{

    /**
     * @var \AlbertMage\PageBuilder\Model\LinkInterface
     */
    protected $link;

    /**
     * @param \AlbertMage\PageBuilder\Model\LinkInterface
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\LinkInterface $link,
        array $params
    )
    {
        $this->link = $link;
        parent::__construct(
            $params
        );
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