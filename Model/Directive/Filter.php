<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Directive;

use Magento\Framework\App\ObjectManager;

use AlbertMage\PageBuilder\Model\Widget\LinkInterface;
use AlbertMage\PageBuilder\Model\Widget\ProductListInterface;
use AlbertMage\PageBuilder\Model\Widget\BlockInterface;
use Magento\Framework\UrlInterface;

/**
 * Filter Model
 * @author Albert Shen <albertshen1206@gmail.com>
 */
class Filter
{

    /**
     * Construction regular expression
     *
     * @deprecated Use the new Directive processors
     */
    const CONSTRUCTION_PATTERN = '/{{([a-z]{0,10})(.*?)}}(?:(.*?)(?:{{\/(?:\\1)}}))?/si';

    /**
     * @var VariableResolverInterface|null
     */
    protected $variableResolver;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \AlbertMage\PageBuilder\Model\DirectiveFactory
     */
    protected $directiveFactory;

    /**
     * @var \AlbertMage\PageBuilder\Model\WidgetFactory
     */
    protected $widgetFactory;

    /**
     * @param \Magento\Framework\Filter\VariableResolverInterface|null $variableResolver
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \AlbertMage\PageBuilder\Model\DirectiveFactory $directiveFactory
     * @param \AlbertMage\PageBuilder\Model\WidgetFactory $widgetFactory
     */
    public function __construct(
        \Magento\Framework\Filter\VariableResolverInterface $variableResolver = null,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \AlbertMage\PageBuilder\Model\DirectiveFactory $directiveFactory,
        \AlbertMage\PageBuilder\Model\WidgetFactory $widgetFactory
    ) {
        $this->variableResolver = $variableResolver ?? ObjectManager::getInstance()->get(\Magento\Framework\Filter\VariableResolverInterface::class);
        $this->storeManager = $storeManager;
        $this->directiveFactory = $directiveFactory;
        $this->widgetFactory = $widgetFactory;
    }

    /**
     * Filter the string.
     *
     * @param string $value
     * @return \AlbertMage\PageBuilder\Api\Data\DirectiveInterface
     * @throws \Exception
     */
    public function filter($value)
    {

        $directive = $this->directiveFactory->create();

        $value = preg_replace('/^[\s\x00]+|[\s\x00]+$/u', '', $value);

        if (preg_match_all(self::CONSTRUCTION_PATTERN, $value, $constructions, PREG_SET_ORDER)) {

            $construction = $constructions[0];
            $directiveType = $construction[1];

            $directive->setType($directiveType);

            if ('media' == $directiveType) {
                $directive->setUrl($this->mediaDirective($construction));
            }

            if ('widget' == $directiveType) {
                $directive->setWidget($this->widgetDirective($construction));
            }
        }
        return $directive;
    }

    /**
     * Filter the media url.
     *
     * @param string $value
     * @return string
     * @throws \Exception
     */
    public function mediaFilter($value)
    {
        $directive = $this->filter($value);
        return $directive->getUrl();
    }

    /**
     * Filter the widget.
     *
     * @param string $value
     * @return @return \AlbertMage\PageBuilder\Api\Data\WidgetInterface
     * @throws \Exception
     */
    public function widgetFilter($value)
    {
        $directive = $this->filter($value);
        return $directive->getWidget();
    }

    /**
     * Filter the string as array data.
     *
     * @param string $value
     * @return array
     * @throws \Exception
     */
    public function contentFilter($value)
    {

        $data = [];

        $value = preg_replace('/^[\s\x00]+|[\s\x00]+$/u', '', $value);

        if (preg_match_all(self::CONSTRUCTION_PATTERN, $value, $constructions, PREG_SET_ORDER)) {
            $replace = [];
            foreach ($constructions as $construction) {
                $replace[] = $construction[0];
            }
            $str = str_replace($replace, ',,', $value);
            $arr = explode(',', $str);
            foreach ($arr as $item) {
                if (!empty($item)) {
                    $data[] = $this->contentFilter($item);
                } else {
                    $construction = array_shift($constructions);
                    if ($construction) {
                        if ($arr = $this->{$construction[1].'Directive'}($construction)) {
                            $data[] = $arr;
                        }
                    }
                }
            }
        } else {
            if ($value) {
                $data[] = [
                    'type' => 'text',
                    'value' => $value
                ];
            }
        }

        return $data;

    }

    /**
     * Generate widget
     *
     * @param string[] $construction
     * @return \AlbertMage\PageBuilder\Api\Data\WidgetInterface
     */
    public function widgetDirective($construction)
    {
        $params = $this->getParameters($construction[2]);

        $widget = $this->widgetFactory->create();

        $widgetType = $params['type'];
        unset($params['type']);
        unset($params['template']);
        $params['store_id'] = $this->storeManager->getStore()->getId();

        $widget->setType($widgetType);

        switch($widgetType) {
            case 'Magento\Catalog\Block\Product\Widget\Link':
                $link = ObjectManager::getInstance()->create(LinkInterface::class, ['params' => $params]);
                $widget->setLink($link->getLink());
                break;
            case 'Magento\Cms\Block\Widget\Page\Link':
                $link = ObjectManager::getInstance()->create(LinkInterface::class, ['params' => $params]);
                $widget->setLink($link->getLink());
                break;
            case 'Magento\Catalog\Block\Category\Widget\Link':
                $link = ObjectManager::getInstance()->create(LinkInterface::class, ['params' => $params]);
                $widget->setLink($link->getLink());
                break;
            case 'Magento\CatalogWidget\Block\Product\ProductsList':
                $product = ObjectManager::getInstance()->create(ProductListInterface::class, ['params' => $params]);
                $widget->setProducts($product->getProductList());
                break;
            case 'Magento\Cms\Block\Widget\Block':
                $block = ObjectManager::getInstance()->create(BlockInterface::class, ['params' => $params]);
                $widget->setBlock($block->getBlock());
                break;
        }

        return $widget;

    }

    /**
     * Retrieve media file URL directive
     *
     * @param string[] $construction
     * @return string
     */
    public function mediaDirective($construction)
    {
        // phpcs:disable Magento2.Functions.DiscouragedFunction
        $params = $this->getParameters(html_entity_decode($construction[2], ENT_QUOTES));
        //return 'http://localhost:9090/media/'.$params['url'];
        return $this->storeManager->getStore()
            ->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) . $params['url'];
    }

    public function configDirective($construction)
    {
        return [];
    }

    /**
     * Return associative array of parameters.
     *
     * @param string $value raw parameters
     * @return array
     * @deprecated 102.0.4 Use the directive interfaces instead
     */
    protected function getParameters($value)
    {
        $tokenizer = new \Magento\Framework\Filter\Template\Tokenizer\Parameter();
        $tokenizer->setString($value);
        $params = $tokenizer->tokenize();
        foreach ($params as $key => $value) {
            if (substr($value, 0, 1) === '$') {
                $params[$key] = $this->getVariable(substr($value, 1), null);
            }
        }
        return $params;
    }

    /**
     * Resolve a variable's value for a given var directive construction
     *
     * @param string $value raw parameters
     * @param string $default default value
     * @return string
     * @deprecated 102.0.4 Use \Magento\Framework\Filter\VariableResolverInterface instead
     */
    protected function getVariable($value, $default = '{no_value_defined}')
    {
        \Magento\Framework\Profiler::start('email_template_processing_variables');
        $result = $this->variableResolver->resolve($value, $this, $this->templateVars) ?? $default;
        \Magento\Framework\Profiler::stop('email_template_processing_variables');

        return $result;
    }

}
