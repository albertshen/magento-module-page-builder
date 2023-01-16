<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Resource\Image;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Mobile implements \AlbertMage\PageBuilder\Model\ResourceInterface
{

    /**
     * @var \AlbertMage\PageBuilder\Model\Directive\Filter
     */
    protected $filter;

    /**
     * @param \AlbertMage\PageBuilder\Model\Directive\Filter
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\Directive\Filter $filter
    )
    {
        $this->filter = $filter;
    }

    /**
     * Process Mobile resource
     * 
     * @param array
     * @return array
     */
    public function process($resources)
    {
        if (isset($resources['mobile_image'])) {
            if (is_string($resources['mobile_image'])) {
                return [
                    'src' => $this->filter->filter($resources['mobile_image']),
                    'title' => '',
                    'alt' => ''
                ];
            }
            if (is_array($resources['mobile_image'])) {
                return [
                    'src' => $this->filter->filter($resources['mobile_image']['src']),
                    'title' => $resources['mobile_image']['title'],
                    'alt' => $resources['mobile_image']['alt']
                ];
            }
        }
        if (isset($resources['desktop_image'])) {
            if (is_string($resources['desktop_image'])) {
                return [
                    'src' => $this->filter->filter($resources['desktop_image']),
                    'title' => '',
                    'alt' => ''
                ];
            }
            if (is_array($resources['desktop_image'])) {
                return [
                    'src' => $this->filter->filter($resources['desktop_image']['src']),
                    'title' => $resources['desktop_image']['title'],
                    'alt' => $resources['desktop_image']['alt']
                ];
            }
        }
    }

}
