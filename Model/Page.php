<?php 
	
namespace AlbertMage\PageBuilder\Model;

use Magento\Framework\App\ObjectManager;

class Page implements \AlbertMage\PageBuilder\Api\PageInterface
{

	/**
	 * {@inheritdoc}
	 */
	public function getPage()
	{
        $body = <<<EOT
<div data-content-type="row"data-appearance="contained"data-element="main"><div data-enable-parallax="0"data-parallax-speed="0.5"data-background-images="{}"data-background-type="image"data-video-src=""data-video-loop="true"data-video-play-only-visible="true"data-video-lazy-load="true"data-video-fallback-src=""data-video-type="uploader"data-element="inner"data-pb-style="Y1287HP"><div data-element="content">albert<img src="{{media url=wysiwyg/leather-1009_05_2.png}}" alt="">shen{{widget type="Magento\CatalogWidget\Block\Product\ProductsList" title="ssfs" show_pager="0" products_count="10" template="Magento_CatalogWidget::product/widget/content/grid.phtml" conditions_encoded="^[`1`:^[`type`:`Magento||CatalogWidget||Model||Rule||Condition||Combine`,`aggregator`:`all`,`value`:`1`,`new_child`:``^],`1--1`:^[`type`:`Magento||CatalogWidget||Model||Rule||Condition||Product`,`attribute`:`color`,`operator`:`==`,`value`:`50`^]^]"}}</div><div data-content-type="products"data-appearance="carousel"data-autoplay="false"data-autoplay-speed="4000"data-infinite-loop="false"data-show-arrows="false"data-show-dots="true"data-carousel-mode="default"data-center-padding="90px"data-element="main">{{widget type="Magento\CatalogWidget\Block\Product\ProductsList"template="Magento_PageBuilder::catalog/product/widget/content/carousel.phtml"anchor_text=""id_path=""show_pager="0"products_count="20"condition_option="category_ids"condition_option_value="3"type_name="Catalog Products Carousel"conditions_encoded="^[`1`:^[`aggregator`:`all`,`new_child`:``,`type`:`Magento||CatalogWidget||Model||Rule||Condition||Combine`,`value`:`1`^],`1--1`:^[`operator`:`==`,`type`:`Magento||CatalogWidget||Model||Rule||Condition||Product`,`attribute`:`category_ids`,`value`:`3`^]^]"sort_order="position"}}</div></div></div><div data-content-type="row"data-appearance="contained"data-element="main"><div data-enable-parallax="1"data-parallax-speed="0.5"data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/file_1.png}}\&quot;}"data-background-type="image"data-video-src=""data-video-loop="true"data-video-play-only-visible="true"data-video-lazy-load="true"data-video-fallback-src=""data-video-type="uploader"data-element="inner"data-pb-style="WDKHGS1"></div></div><div data-content-type="row"data-appearance="contained"data-element="main"><div data-enable-parallax="0"data-parallax-speed="0.5"data-background-images="{}"data-background-type="image"data-video-src=""data-video-loop="true"data-video-play-only-visible="true"data-video-lazy-load="true"data-video-fallback-src=""data-video-type="uploader"data-element="inner"data-pb-style="FCSGLCJ"><a href="{{widget type='Magento\Catalog\Block\Product\Widget\Link' id_path='product/4' template='Magento_PageBuilder::widget/link_href.phtml' type_name='Catalog Product Link' }}"target=""data-link-type="default"data-element="link"><div class="albertshen"data-content-type="video"data-appearance="default"data-element="main"data-pb-style="XWNM8QY"><div class="pagebuilder-video-inner"data-element="inner"data-pb-style="OEF0R1U"><div class="pagebuilder-video-wrapper"data-element="wrapper"data-pb-style="P46T6H0"><div class="pagebuilder-video-container"><video frameborder="0"controls=""src="{{media url=video/VIDEO_TEASER_1_1080x1080-CN_63.mp4}}"autoplay="true"muted="true"poster=""data-video-type="uploader"data-element="video"></video></div></div></div></div><figure data-content-type="image"data-appearance="full-width"data-element="main"data-pb-style="Q80JQ33"><a href="{{widget type='Magento\Catalog\Block\Product\Widget\Link' id_path='product/4' template='Magento_PageBuilder::widget/link_href.phtml' type_name='Catalog Product Link' }}" target="" data-link-type="product" title="" data-element="link"><img class="pagebuilder-mobile-hidden"src="{{media url=wysiwyg/mentie-1104-__03.png}}"alt=""title=""data-element="desktop_image"data-pb-style="RO62DMC"><img class="pagebuilder-mobile-only"src="{{media url=wysiwyg/mentie-1104-__03.png}}"alt=""title=""data-element="mobile_image"data-pb-style="UPU570W"></a></figure><div data-content-type="video"data-appearance="default"data-element="main"><div class="pagebuilder-video-inner"data-element="inner"><div class="pagebuilder-video-wrapper"data-element="wrapper"><div class="pagebuilder-video-container"><video frameborder="0"controls=""src="{{media url=video/VIDEO_TEASER_1_1080x1080-CN_62.mp4}}"poster=""data-video-type="uploader"data-element="video"></video></div></div></div></div></a></div></div><div data-content-type="row"data-appearance="contained"data-element="main"><div data-enable-parallax="0"data-parallax-speed="0.5"data-background-images="{}"data-background-type="image"data-video-src=""data-video-loop="true"data-video-play-only-visible="true"data-video-lazy-load="true"data-video-fallback-src=""data-video-type="uploader"data-element="inner"data-pb-style="Q1XNN9H"><div data-content-type="video"data-appearance="default"data-element="main"><div class="pagebuilder-video-inner"data-element="inner"><div class="pagebuilder-video-wrapper"data-element="wrapper"><div class="pagebuilder-video-container"><video frameborder="0"controls=""src="{{media url=video/white_192.mp4}}"poster=""data-video-type="uploader"data-element="video"></video></div></div></div></div></div></div>
EOT;

	
   
        // $p = ObjectManager::getInstance()->create(\Magento\Catalog\Api\ProductRepositoryInterface::class);
        // $product = $p->getById(2046);
        // //var_dump($a->getUrlModel());exit;
        // $data = $product->getTypeInstance()->getConfigurableOptions($product);
        // var_dump($data);exit;
        // var_dump(get_class_methods($a));exit;
        $dom = ObjectManager::getInstance()->create(\AlbertMage\PageBuilder\Model\Dom::class);

        return $dom->parse($body);
	}

}