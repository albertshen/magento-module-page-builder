<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\DataObject;
use AlbertMage\PageBuilder\Api\Data\ElementInterface;

/**
 * Element
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Element extends DataObject implements ElementInterface
{

    /**
     * Get content type
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->getData(self::CONTENT_TYPE);
    }

    /**
     * Set content type
     *
     * @param string $contentType
     * @return $this
     */
    public function setContentType($contentType)
    {
        return $this->setData(self::CONTENT_TYPE, $contentType);
    }

    /**
     * Get appearance
     *
     * @return string|null Appearance. Otherwise, null.
     */
    public function getAppearance()
    {
        return $this->getData(self::APPEARANCE);
    }

    /**
     * Set appearance
     *
     * @param string $appearance
     * @return $this
     */
    public function setAppearance($appearance)
    {
        return $this->setData(self::APPEARANCE, $appearance);
    }

    /**
     * Get Element
     *
     * @return string|null Element. Otherwise, null.
     */
    public function getElement()
    {
        return $this->getData(self::ELEMENT);
    }

    /**
     * Set Element
     *
     * @param string $element
     * @return $this
     */
    public function setElement($element)
    {
        return $this->setData(self::ELEMENT, $element);
    }

    /**
     * Get style
     *
     * @return string|null Style. Otherwise, null.
     */
    public function getStyle($style)
    {
        return $this->getData(self::ENABLE_PARALLAX);
    }

    /**
     * Set style
     *
     * @param string $pbStyle
     * @return $this
     */
    public function setStyle($style)
    {
        return $this->setData(self::ENABLE_PARALLAX, $style);
    }
        
    /**
     * Get enable parallax
     *
     * @return int|null Enable parallax. Otherwise, null.
     */
    public function getEnableParallax()
    {
        return $this->getData(self::ENABLE_PARALLAX);
    }

    /**
     * Set enable parallax
     *
     * @param int $enableParallax
     * @return $this
     */
    public function setEnableParallax($enableParallax)
    {
        return $this->setData(self::ENABLE_PARALLAX, $enableParallax);
    }

    /**
     * Get parallax speed
     *
     * @return float|null Parallax speed. Otherwise, null.
     */
    public function getParallaxSpeed()
    {
        return $this->getData(self::PARALLAX_SPEED);
    }

    /**
     * Set parallax speed
     *
     * @param float $parallaxSpeed
     * @return $this
     */
    public function setParallaxSpeed($parallaxSpeed)
    {
        return $this->setData(self::PARALLAX_SPEED, $parallaxSpeed);
    }

    /**
     * Get background type
     *
     * @return string|null Background type. Otherwise, null.
     */
    public function getBackgroundType()
    {
        return $this->getData(self::BACKGROUND_TYPE);
    }

    /**
     * Set background type
     *
     * @param string $backgroundType
     * @return $this
     */
    public function setBackgroundType($backgroundType)
    {
        return $this->setData(self::BACKGROUND_TYPE, $backgroundType);
    }
    
    /**
     * Get background images
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ImageInterface|null Background images. Otherwise, null.
     */
    public function getBackgroundImages()
    {
        return $this->getData(self::BACKGROUND_IMAGES);
    }

    /**
     * Set background images
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ImageInterface $backgroundImages
     * @return $this
     */
    public function setBackgroundImages($backgroundImages)
    {
        return $this->setData(self::BACKGROUND_IMAGES, $backgroundImages);
    }

    /**
     * Get background video
     *
     * @return \AlbertMage\PageBuilder\Api\Data\VideoInterface|null Background video. Otherwise, null.
     */
    public function getBackgroundVideo()
    {
        return $this->getData(self::BACKGROUND_VIDEO);
    }

    /**
     * Set background video
     *
     * @param \AlbertMage\PageBuilder\Api\Data\VideoInterface $backgroundVideo
     * @return $this
     */
    public function setBackgroundVideo($backgroundVideo)
    {
        return $this->setData(self::BACKGROUND_VIDEO, $backgroundVideo);
    }

    /**
     * Get video src
     *
     * @return string|null Video src. Otherwise, null.
     */
    public function getVideoSrc()
    {
        return $this->getData(self::VIDEO_SRC);
    }

    /**
     * Set video src
     *
     * @param string $videoSrc
     * @return $this
     */
    public function setVideoSrc($videoSrc)
    {
        return $this->setData(self::VIDEO_SRC, $videoSrc);
    }

    /**
     * Get video loop
     *
     * @return bool|null Video loop. Otherwise, null.
     */
    public function getVideoLoop()
    {
        return $this->getData(self::VIDEO_LOOP);
    }

    /**
     * Set video loop
     *
     * @param bool $videoLoop
     * @return $this
     */
    public function setVideoLoop($videoLoop)
    {
        return $this->setData(self::VIDEO_LOOP, $videoLoop);
    }

    /**
     * Get video play only visible
     *
     * @return bool|null Video play only visible. Otherwise, null.
     */
    public function getVideoPlayOnlyVisible()
    {
        return $this->getData(self::VIDEO_PLAY_ONLY_VISIBLE);
    }

    /**
     * Set video play only visible
     *
     * @param bool $videoPlayOnlyVisible
     * @return $this
     */
    public function setVideoPlayOnlyVisible($videoPlayOnlyVisible)
    {
        return $this->setData(self::VIDEO_PLAY_ONLY_VISIBLE, $videoPlayOnlyVisible);
    }

    /**
     * Get video lazy load
     *
     * @return bool|null Video lazy load. Otherwise, null.
     */
    public function getVideoLazyLoad()
    {
        return $this->getData(self::VIDEO_LASY_LOAD);
    }

    /**
     * Set video lazy load
     *
     * @param bool $videoLazyLoad
     * @return $this
     */
    public function setVideoLazyLoad($videoLazyLoad)
    {
        return $this->setData(self::VIDEO_LASY_LOAD, $videoLazyLoad);
    }

    /**
     * Get video fallback src
     *
     * @return string|null Video fallback src. Otherwise, null.
     */
    public function getVideoFallbackSrc()
    {
        return $this->getData(self::VIDEO_FALLBACK_SRC);
    }

    /**
     * Set video fallback src
     *
     * @param string $videoFallbackSrc
     * @return $this
     */
    public function setVideoFallbackSrc($videoFallbackSrc)
    {
        return $this->setData(self::VIDEO_FALLBACK_SRC, $videoFallbackSrc);
    }

    /**
     * Get video type
     *
     * @return string|null Video type. Otherwise, null.
     */
    public function getVideoType()
    {
        return $this->getData(self::VIDEO_TYPE);
    }

    /**
     * Set video type
     *
     * @param string $videoType
     * @return $this
     */
    public function setVideoType($videoType)
    {
        return $this->setData(self::VIDEO_TYPE, $videoType);
    }

    /**
     * Get video muted
     *
     * @return string|null Video muted. Otherwise, null.
     */
    public function getVideoMuted()
    {
        return $this->getData(self::VIDEO_MUTED);
    }

    /**
     * Set video muted
     *
     * @param string $videoMuted
     * @return $this
     */
    public function setVideoMuted($videoMuted)
    {
        return $this->setData(self::VIDEO_MUTED, $videoMuted);
    }

    /****** Row attributes ******/

    /**
     * Get grid size
     * column-group type attribute
     *
     * @return int|null Gird size. Otherwise, null.
     */
    public function getGridSize()
    {
        return $this->getData(self::GRID_SIZE);
    }

    /**
     * Set grid size
     * column-group type attribute
     *
     * @param string $girdSize
     * @return $this
     */
    public function setGridSize($girdSize)
    {
        return $this->setData(self::GRID_SIZE, $girdSize);
    }

    /**
     * Get active tab
     *
     * @return string|null Acitve tab. Otherwise, null.
     */
    public function getActiveTab()
    {
        return $this->getData(self::ACTIVE_TAB);
    }

    /**
     * Set active tab
     *
     * @param string $activeTab
     * @return $this
     */
    public function setActiveTab($activeTab)
    {
        return $this->setData(self::ACTIVE_TAB, $activeTab);
    }

    /**
     * Get tab name 
     *
     * @return string|null Tab name. Otherwise, null.
     */
    public function getTabname()
    {
        return $this->getData(self::TAB_NAME);
    }

    /**
     * Set tab name 
     *
     * @param string $tabname
     * @return $this
     */
    public function setTabname($tabname)
    {
        return $this->setData(self::TAB_NAME, $tabname);
    }

    /**
     * Get autoplay
     *
     * @return bool|null Autoplay. Otherwise, null.
     */
    public function getAutoplay()
    {
        return $this->getData(self::AUTOPLAY);
    }

    /**
     * Set autoplay
     *
     * @param bool $videoLazyLoad
     * @return $this
     */
    public function setAutoplay($autoplay)
    {
        return $this->setData(self::AUTOPLAY, $autoplay);
    }

    /**
     * Get autoplay speed
     *
     * @return int|null Autoplay speed. Otherwise, null.
     */
    public function getAutoPlaySpeed()
    {
        return $this->getData(self::AUTOPLAY_SPEED);
    }

    /**
     * Set autoplay speed
     *
     * @param int $autoPlaySpeed
     * @return $this
     */
    public function setAutoPlaySpeed($autoPlaySpeed)
    {
        return $this->setData(self::AUTOPLAY_SPEED, $autoPlaySpeed);
    }

    /**
     * Get fade
     *
     * @return bool|null Fade. Otherwise, null.
     */
    public function getFade()
    {
        return $this->getData(self::FADE);
    }

    /**
     * Set fade
     *
     * @param bool $fade
     * @return $this
     */
    public function setFade($fade)
    {
        return $this->setData(self::FADE, $fade);
    }

    /**
     * Get infinite loop
     *
     * @return bool|null Infinite loop. Otherwise, null.
     */
    public function getInfiniteLoop()
    {
        return $this->getData(self::INFINITE_LOOP);
    }

    /**
     * Set infinite loop
     *
     * @param bool $infiniteLoop
     * @return $this
     */
    public function setInfiniteLoop($infiniteLoop)
    {
        return $this->setData(self::INFINITE_LOOP, $infiniteLoop);
    }

    /**
     * Get show arrows
     *
     * @return bool|null Show arrows. Otherwise, null.
     */
    public function getShowArrows()
    {
        return $this->getData(self::SHOW_ARROWS);
    }

    /**
     * Set show arrows
     *
     * @param bool $showArrows
     * @return $this
     */
    public function setShowArrows($showArrows)
    {
        return $this->setData(self::SHOW_ARROWS, $showArrows);
    }

    /**
     * Get show dots
     *
     * @return bool|null Show dots. Otherwise, null.
     */
    public function getShowDots()
    {
        return $this->getData(self::SHOW_DOTS);
    }

    /**
     * Set show dots
     *
     * @param bool $showDots
     * @return $this
     */
    public function setShowDots($showDots)
    {
        return $this->setData(self::SHOW_DOTS, $showDots);
    }

    /**
     * Get carousel mode
     *
     * @return string|null Carousel mode. Otherwise, null.
     */
    public function getCarouselMode()
    {
        return $this->getData(self::CAROUSEL_MODE);
    }

    /**
     * Set carousel mode
     *
     * @param string $carouselMode
     * @return $this
     */
    public function setCarouselMode($carouselMode)
    {
        return $this->setData(self::CAROUSEL_MODE, $carouselMode);
    }

    /**
     * Get show button
     *
     * @return string|null Show button. Otherwise, null.
     */
    public function getShowButton()
    {
        return $this->getData(self::SHOW_BUTTON);
    }

    /**
     * Set show button
     *
     * @param string $showButton
     * @return $this
     */
    public function setShowButton($showButton)
    {
        return $this->setData(self::SHOW_BUTTON, $showButton);
    }

    /**
     * Get show overlay
     *
     * @return string|null Show overlay. Otherwise, null.
     */
    public function getShowOverlay()
    {
        return $this->getData(self::SHOW_OVERLAY);
    }

    /**
     * Set show overlay
     *
     * @param string $showOverlay
     * @return $this
     */
    public function setShowOverlay($showOverlay)
    {
        return $this->setData(self::SHOW_OVERLAY, $showOverlay);
    }

    /**
     * Get overlay color
     *
     * @return string|null Overlay color. Otherwise, null.
     */
    public function getOverlayColor()
    {
        return $this->getData(self::OVERLAY_COLOR);
    }

    /**
     * Set overlay color
     *
     * @param string $overlayColor
     * @return $this
     */
    public function setOverlayColor($overlayColor)
    {
        return $this->setData(self::OVERLAY_COLOR, $overlayColor);
    }

    /**
     * Get elements
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface[]|null Elements. Otherwise, null.
     */
    public function getElements()
    {
        return $this->getData(self::ELEMENTS);
    }

    /**
     * Set elements
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ElementInterface[] $elements
     * @return $this
     */
    public function setElements($elements)
    {
        return $this->setData(self::ELEMENTS, $elements);
    }

    /**
     * Get products
     *
     * @return \AlbertMage\Catalog\Api\Data\ProductInterface[]|null Products. Otherwise, null.
     */
    public function getProducts()
    {
        return $this->getData(self::PRODUCTS);
    }

    /**
     * Set products
     *
     * @param \AlbertMage\Catalog\Api\Data\ProductInterface[] $products
     * @return $this
     */
    public function setPorducts($products)
    {
        return $this->setData(self::PRODUCTS, $products);
    }

    /**
     * Get content
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ContentInterface[]|null Content. Otherwise, null.
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * Get text
     *
     * @return string|null Text. Otherwise, null.
     */
    public function getText()
    {
        return $this->getData(self::TEXT);
    }

    /**
     * Set text
     *
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        return $this->setData(self::TEXT, $text);
    }

    /**
     * Get button text
     *
     * @return string|null Button text. Otherwise, null.
     */
    public function getButtonText()
    {
        return $this->getData(self::BUTTON_TEXT);
    }

    /**
     * Set button text
     *
     * @param string $buttonText
     * @return $this
     */
    public function setButtonText($buttonText)
    {
        return $this->setData(self::BUTTON_TEXT, $buttonText);
    }

    /**
     * Set content
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ContentInterface[] $content
     * @return $this
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * Get link
     *
     * @return \AlbertMage\PageBuilder\Api\Data\LinkInterface|null Link. Otherwise, null.
     */
    public function getLink()
    {
        return $this->getData(self::LINK);
    }

    /**
     * Set link
     *
     * @param \AlbertMage\PageBuilder\Api\Data\LinkInterface $link
     * @return $this
     */
    public function setLink($link)
    {
        return $this->setData(self::LINK, $link);
    }

    /**
     * Get image
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ImageInterface|null Image. Otherwise, null.
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * Set image
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ImageInterface $image
     * @return $this
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Get video
     *
     * @return \AlbertMage\PageBuilder\Api\Data\VideoInterface|null Video. Otherwise, null.
     */
    public function getVideo()
    {
        return $this->getData(self::VIDEO);
    }

    /**
     * Set video
     *
     * @param \AlbertMage\PageBuilder\Api\Data\VideoInterface $video
     * @return $this
     */
    public function setVideo($video)
    {
        return $this->setData(self::VIDEO, $video);
    }

    /**
     * Get slider
     *
     * @return \AlbertMage\PageBuilder\Api\Data\SlideInterface[]|null Slider. Otherwise, null.
     */
    public function getSlider()
    {
        return $this->getData(self::SLIDER);
    }

    /**
     * Set slider
     *
     * @param \AlbertMage\PageBuilder\Api\Data\SlideInterface[] $slider
     * @return $this
     */
    public function setSlider($slider)
    {
        return $this->setData(self::SLIDER, $slider);
    }

    /**
     * Get tab header
     *
     * @return \AlbertMage\PageBuilder\Api\Data\TabHeaderInterface[]|null Tab header. Otherwise, null.
     */
    public function getTabHeader()
    {
        return $this->getData(self::TAB_HEADER);
    }

    /**
     * Set tab header
     *
     * @param \AlbertMage\PageBuilder\Api\Data\TabHeaderInterface[] $tabHeader
     * @return $this
     */
    public function setTabHeader($tabHeader)
    {
        return $this->setData(self::TAB_HEADER, $tabHeader);
    }

    /**
     * Get tab items
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface[]|null Tab items. Otherwise, null.
     */
    public function getTabItems()
    {
        return $this->getData(self::TAB_ITEMS);
    }

    /**
     * Set tab items
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ElementInterface[] $tabItems
     * @return $this
     */
    public function setTabItems($tabItems)
    {
        return $this->setData(self::TAB_ITEMS, $tabItems);
    }

    /**
     * Get caption
     *
     * @return string|null Caption. Otherwise, null.
     */
    public function getCaption()
    {
        return $this->getData(self::CAPTION);
    }

    /**
     * Set caption
     *
     * @param string $caption
     * @return $this
     */
    public function setCaption($caption)
    {
        return $this->setData(self::CAPTION, $caption);
    }
}
