<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

/**
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Processor
{

    /**
     * @var \AlbertMage\PageBuilder\Model\Directive\Filter
     */
    protected $filter;

    /**
     * @var \AlbertMage\PageBuilder\Model\VideoFactory
     */
    protected $videoFactory;

    /**
     * @var \AlbertMage\PageBuilder\Model\ImageFactory
     */
    protected $imageFactory;

    /**
     * @param \AlbertMage\PageBuilder\Model\Directive\Filter
     * @param \AlbertMage\PageBuilder\Model\VideoFactory $videoFactory
     * @param \AlbertMage\PageBuilder\Model\ImageFactory $imageFactory
     */
    public function __construct(
        \AlbertMage\PageBuilder\Model\Directive\Filter $filter,
        \AlbertMage\PageBuilder\Model\VideoFactory $videoFactory,
        \AlbertMage\PageBuilder\Model\ImageFactory $imageFactory
    )
    {
        $this->filter = $filter;
        $this->videoFactory = $videoFactory;
        $this->imageFactory = $imageFactory;
    }

    /**
     * Process Background
     * 
     * @param \AlbertMage\PageBuilder\Api\Data\ElementInterface $elementData
     * @throws LocalizedException
     */
    public function processBackgound(
        \AlbertMage\PageBuilder\Api\Data\ElementInterface $elementData
    ) {

        if ('image' == $elementData->getData('background_type')) {
            if ($image = $this->processBackgoundImage($elementData->getData('background_images'))) {
                $elementData->setBackgroundImages($image);
            } else {
                $elementData->unsetData('background_images');
                $elementData->unsetData('background_type');
            }
        } else {
            if ($videoSrc = $elementData->getData('video_src')) {
                $url = str_replace('mp4:', '', $videoSrc);
                if ('uploader' == $elementData->getData('video_type')) {
                    $url = $this->filter->mediaFilter($url);
                }
                $video = $this->videoFactory->create();
                $video->setSrc($url);
                $video->setLoop($elementData->getData('video_loop'));
                $video->setPlayOnlyVisible($elementData->getData('video_play_only_visible'));
                $video->setLazyLoad($elementData->getData('video-lazy-load'));
                if ($elementData->hasData('video_fallback_src')) {
                    $video->setFallbackSrc(
                        $this->filter->mediaFilter($elementData->getData('video_fallback_src'))
                    );
                }
                if ($elementData->hasData('video_muted')) {
                    $video->setMuted($elementData->getData('video_muted'));
                }
                $elementData->setBackgroundVideo($video);
            }
            $elementData->unsetData('background_images');
        }
    }

    /**
     * Process background image
     * 
     * @param @return string $media
     * @return \AlbertMage\PageBuilder\Api\Data\ImageInterface|null
     * @throws LocalizedException
     */
    public function processBackgoundImage($media)
    {
        $images = json_decode(stripslashes(htmlspecialchars_decode($media)), true);

        if (empty($images)) {
            return null;
        }

        $image = $this->imageFactory->create();

        foreach ($images as $key => $value) {
            $src = $this->filter->mediaFilter($value);
            if ('desktop_image' == $key) {
                $image->setDesktopSrc($src); 
            }
            if ('mobile_image' == $key) {
                $image->setMobileSrc($src); 
            }
        }

        $this->processImage($image);

        return $image;
    }

    /**
     * Process background image
     * 
     * @param \AlbertMage\PageBuilder\Api\Data\ImageInterface
     * @throws LocalizedException
     */
    public function processImage(
        \AlbertMage\PageBuilder\Api\Data\ImageInterface $image,
        $responsive = false
    ) {
        if (!$responsive) {
            if($image->hasData('mobile_src')) {
                $image->setSrc($image->getMobileSrc());
            } else {
                $image->setSrc($image->getDesktopSrc());
            }
            $image->unsetData('mobile_src');
            $image->unsetData('desktop_src');
        }
    }

}
