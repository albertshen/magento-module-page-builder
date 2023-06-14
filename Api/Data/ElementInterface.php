<?php
/**
 * Copyright © PHP Digital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Api\Data;

/**
 * Interface Element
 * @author Albert Shen <albertshen1206@gmail.com>
 */
interface ElementInterface
{

    const CONTENT_TYPE = 'content_type'; // base attribute

    const APPEARANCE = 'appearance'; // base attribute

    const ELEMENT = 'element'; // base attribute

    const STYLE = 'style'; // base atrribute

    const ENABLE_PARALLAX = 'enable_parallax'; // row type attribute

    const PARALLAX_SPEED = 'parallax_speed'; // row type attribute

    const BACKGROUND_TYPE = 'background_type'; // row type attribute

    const BACKGROUND_IMAGES = 'background_images'; // row type attribute

    const BACKGROUND_VIDEO = 'background_video';

    const GRID_SIZE = 'grid_size'; //column-group type attribute

    const ACTIVE_TAB = 'active_tab'; //tabs type attribute

    const TAB_NAME = 'tab_name'; //tabs type attribute

    const AUTOPLAY = 'autoplay'; // slider typt attribute

    const AUTOPLAY_SPEED = 'autoplay_speed'; // slider type attribute

    const FADE = 'fade'; // slider type attribute

    const INFINITE_LOOP = 'infinite_loop'; // slider type attribute

    const SHOW_ARROWS = 'show_arrows'; // slider type attribute

    const SHOW_DOTS = 'show_dots'; // slider type attribute

    const CAROUSEL_MODE = 'carousel_mode'; // slider type attribute

    const SHOW_BUTTON = 'show_button'; // slide type attribute

    const SHOW_OVERLAY = 'show_overlay'; // slide type attribute

    const OVERLAY_COLOR = 'overlay_color'; // slide type attribute

    const ELEMENTS = 'elements'; // data attribute

    const PRODUCTS = 'products'; // data attribute

    const CONTENT = 'content'; // data attribute

    const CONTENT_RAW = 'content_raw'; // data attribute

    const TEXT = 'text'; // data attribute

    const BUTTON_TEXT = 'button_text'; // data attribute

    const LINK = 'link'; // data attribute

    const IMAGE = 'image'; // data attribute

    const VIDEO = 'video'; // data attribute

    const SLIDER = 'slider'; // data attribute

    const TAB_HEADER = 'tab_header'; // data attribute

    const TAB_ITEMS = 'tab_items'; // data attribute

    const CAPTION = 'caption';

    /****** Row attributes ******/

    /**
     * Get content type
     *
     * @return string|null
     */
    public function getContentType();

    /**
     * Set content type
     *
     * @param string $contentType
     * @return $this
     */
    public function setContentType($contentType);

    /**
     * Get appearance
     *
     * @return string|null Appearance. Otherwise, null.
     */
    public function getAppearance();

    /**
     * Set appearance
     *
     * @param string $appearance
     * @return $this
     */
    public function setAppearance($appearance);

    /**
     * Get Element
     *
     * @return string|null Element. Otherwise, null.
     */
    public function getElement();

    /**
     * Set Element
     *
     * @param string $element
     * @return $this
     */
    public function setElement($element);

    /**
     * Get style
     *
     * @return string|null style. Otherwise, null.
     */
    public function getStyle($style);

    /**
     * Set style
     *
     * @param string $style
     * @return $this
     */
    public function setStyle($style);
        
    /**
     * Get enable parallax
     *
     * @return int|null Enable parallax. Otherwise, null.
     */
    public function getEnableParallax();

    /**
     * Set enable parallax
     *
     * @param int $enableParallax
     * @return $this
     */
    public function setEnableParallax($enableParallax);

    /**
     * Get parallax speed
     *
     * @return float|null Parallax speed. Otherwise, null.
     */
    public function getParallaxSpeed();

    /**
     * Set parallax speed
     *
     * @param float $parallaxSpeed
     * @return $this
     */
    public function setParallaxSpeed($parallaxSpeed);

    /**
     * Get background type
     *
     * @return string|null Background type. Otherwise, null.
     */
    public function getBackgroundType();

    /**
     * Set background type
     *
     * @param string $backgroundType
     * @return $this
     */
    public function setBackgroundType($backgroundType);

    /**
     * Get background images
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ImageInterface|null Background images. Otherwise, null.
     */
    public function getBackgroundImages();

    /**
     * Set background images
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ImageInterface $backgroundImages
     * @return $this
     */
    public function setBackgroundImages($backgroundImages);

    /**
     * Get background video
     *
     * @return \AlbertMage\PageBuilder\Api\Data\VideoInterface|null Background video. Otherwise, null.
     */
    public function getBackgroundVideo();

    /**
     * Set background video
     *
     * @param \AlbertMage\PageBuilder\Api\Data\VideoInterface $backgroundVideo
     * @return $this
     */
    public function setBackgroundVideo($backgroundVideo);

    /****** Row attributes ******/

    /**
     * Get grid size
     * column-group type attribute
     *
     * @return int|null Gird size. Otherwise, null.
     */
    public function getGridSize();

    /**
     * Set grid size
     * column-group type attribute
     *
     * @param int $girdSize
     * @return $this
     */
    public function setGridSize($girdSize);

    /**
     * Get active tab
     *
     * @return string|null Acitve tab. Otherwise, null.
     */
    public function getActiveTab();

    /**
     * Set active tab
     *
     * @param string $activeTab
     * @return $this
     */
    public function setActiveTab($activeTab);

    /**
     * Get tab name 
     *
     * @return string|null Tab name. Otherwise, null.
     */
    public function getTabname();

    /**
     * Set tab name 
     *
     * @param string $tabname
     * @return $this
     */
    public function setTabname($tabname);

    /**
     * Get autoplay
     *
     * @return bool|null Autoplay. Otherwise, null.
     */
    public function getAutoplay();

    /**
     * Set autoplay
     *
     * @param bool $videoLazyLoad
     * @return $this
     */
    public function setAutoplay($autoplay);

    /**
     * Get autoplay speed
     *
     * @return int|null Autoplay speed. Otherwise, null.
     */
    public function getAutoPlaySpeed();

    /**
     * Set autoplay speed
     *
     * @param int $autoPlaySpeed
     * @return $this
     */
    public function setAutoPlaySpeed($autoPlaySpeed);

    /**
     * Get fade
     *
     * @return bool|null Fade. Otherwise, null.
     */
    public function getFade();

    /**
     * Set fade
     *
     * @param bool $fade
     * @return $this
     */
    public function setFade($fade);

    /**
     * Get infinite loop
     *
     * @return bool|null Infinite loop. Otherwise, null.
     */
    public function getInfiniteLoop();

    /**
     * Set infinite loop
     *
     * @param bool $infiniteLoop
     * @return $this
     */
    public function setInfiniteLoop($infiniteLoop);

    /**
     * Get show arrows
     *
     * @return bool|null Show arrows. Otherwise, null.
     */
    public function getShowArrows();

    /**
     * Set show arrows
     *
     * @param bool $showArrows
     * @return $this
     */
    public function setShowArrows($showArrows);

    /**
     * Get show dots
     *
     * @return bool|null Show dots. Otherwise, null.
     */
    public function getShowDots();

    /**
     * Set show dots
     *
     * @param bool $showDots
     * @return $this
     */
    public function setShowDots($showDots);

    /**
     * Get carousel mode
     *
     * @return string|null Carousel mode. Otherwise, null.
     */
    public function getCarouselMode();

    /**
     * Set carousel mode
     *
     * @param string $carouselMode
     * @return $this
     */
    public function setCarouselMode($carouselMode);

    /**
     * Get show button
     *
     * @return string|null Show button. Otherwise, null.
     */
    public function getShowButton();

    /**
     * Set show button
     *
     * @param string $showButton
     * @return $this
     */
    public function setShowButton($showButton);

    /**
     * Get show overlay
     *
     * @return string|null Show overlay. Otherwise, null.
     */
    public function getShowOverlay();

    /**
     * Set show overlay
     *
     * @param string $showOverlay
     * @return $this
     */
    public function setShowOverlay($showOverlay);

    /**
     * Get overlay color
     *
     * @return string|null Overlay color. Otherwise, null.
     */
    public function getOverlayColor();

    /**
     * Set overlay color
     *
     * @param string $overlayColor
     * @return $this
     */
    public function setOverlayColor($overlayColor);

    /**
     * Get elements
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface[]|null Elements. Otherwise, null.
     */
    public function getElements();

    /**
     * Set elements
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ElementInterface[] $elements
     * @return $this
     */
    public function setElements($elements);

    /**
     * Get products
     *
     * @return \AlbertMage\Catalog\Api\Data\ProductInterface[]|null Products. Otherwise, null.
     */
    public function getProducts();

    /**
     * Set products
     *
     * @param \AlbertMage\Catalog\Api\Data\ProductInterface[] $products
     * @return $this
     */
    public function setPorducts($products);

    /**
     * Get content
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ContentInterface[]|null Content. Otherwise, null.
     */
    public function getContent();

    /**
     * Set content
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ContentInterface[] $content
     * @return $this
     */
    public function setContent($content);

    /**
     * Get content raw
     *
     * @return string|null contentRaw. Otherwise, null.
     */
    public function getContentRaw();

    /**
     * Set content
     *
     * @param string $contentRaw
     * @return $this
     */
    public function setContentRaw($contentRaw);

    /**
     * Get text
     *
     * @return string|null Text. Otherwise, null.
     */
    public function getText();

    /**
     * Set text
     *
     * @param string $text
     * @return $this
     */
    public function setText($text);

    /**
     * Get button text
     *
     * @return string|null Button text. Otherwise, null.
     */
    public function getButtonText();

    /**
     * Set button text
     *
     * @param string $buttonText
     * @return $this
     */
    public function setButtonText($buttonText);


    /**
     * Get link
     *
     * @return \AlbertMage\PageBuilder\Api\Data\LinkInterface|null Link. Otherwise, null.
     */
    public function getLink();

    /**
     * Set link
     *
     * @param \AlbertMage\PageBuilder\Api\Data\LinkInterface $link
     * @return $this
     */
    public function setLink($link);

    /**
     * Get image
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ImageInterface|null Image. Otherwise, null.
     */
    public function getImage();

    /**
     * Set image
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ImageInterface $image
     * @return $this
     */
    public function setImage($image);

    /**
     * Get video
     *
     * @return \AlbertMage\PageBuilder\Api\Data\VideoInterface|null Video. Otherwise, null.
     */
    public function getVideo();

    /**
     * Set video
     *
     * @param \AlbertMage\PageBuilder\Api\Data\VideoInterface $video
     * @return $this
     */
    public function setVideo($video);

    /**
     * Get slider
     *
     * @return \AlbertMage\PageBuilder\Api\Data\SlideInterface[]|null Slider. Otherwise, null.
     */
    public function getSlider();

    /**
     * Set slider
     *
     * @param \AlbertMage\PageBuilder\Api\Data\SlideInterface[] $slider
     * @return $this
     */
    public function setSlider($slider);

    /**
     * Get tab header
     *
     * @return \AlbertMage\PageBuilder\Api\Data\TabHeaderInterface[]|null Tab header. Otherwise, null.
     */
    public function getTabHeader();

    /**
     * Set tab header
     *
     * @param \AlbertMage\PageBuilder\Api\Data\TabHeaderInterface[] $tabHeader
     * @return $this
     */
    public function setTabHeader($tabHeader);

    /**
     * Get tab items
     *
     * @return \AlbertMage\PageBuilder\Api\Data\ElementInterface[]|null Tab items. Otherwise, null.
     */
    public function getTabItems();

    /**
     * Set tab items
     *
     * @param \AlbertMage\PageBuilder\Api\Data\ElementInterface[] $tabItems
     * @return $this
     */
    public function setTabItems($tabItems);

    /**
     * Get caption
     *
     * @return string|null Caption. Otherwise, null.
     */
    public function getCaption();

    /**
     * Set caption
     *
     * @param string $caption
     * @return $this
     */
    public function setCaption($caption);

}
