<?php
/**
 * Copyright © PHPDigital, Inc. All rights reserved.
 */
namespace AlbertMage\PageBuilder\Model\Directive;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\UrlInterface;

/**
 * Template Filter Model
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
    private $variableResolver;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var array
     */
    protected $widgetMetaData;

    /**
     * @param \Magento\Framework\Filter\VariableResolverInterface|null $variableResolver
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Framework\Filter\VariableResolverInterface $variableResolver = null,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $widgetMetaData
    ) {
        $this->variableResolver = $variableResolver ?? ObjectManager::getInstance()->get(\Magento\Framework\Filter\VariableResolverInterface::class);
        $this->_storeManager = $storeManager;
        $this->widgetMetaData = $widgetMetaData;
    }

    /**
     * Filter the string as array data.
     *
     * @param string $value
     * @return array
     * @throws \Exception
     */
    public function filter($value)
    {
        $results = [];

        if (preg_match_all(self::CONSTRUCTION_PATTERN, $value, $constructions, PREG_SET_ORDER)) {
            foreach ($constructions as $construction) {
                $results[] = $this->{$construction[1].'Directive'}($construction);
            }
        } else {
            return $value;
        }

        if (count($results) === 1) {
            $results = $results[0];
        }

        return $results;
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
     * @return string
     */
    public function widgetDirective($construction)
    {
        return $this->generateWidget($construction);
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
        return 'http://localhost:9090/media/'.$params['url'];
        return $this->_storeManager->getStore()
            ->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) . $params['url'];
    }

    public function configDirective($construction)
    {
        return [];
    }
    
    /**
     * General method for generate widget
     *
     * @param string[] $construction
     * @return array
     */
    public function generateWidget($construction)
    {
        $params = $this->getParameters($construction[2]);

        $params['type'] = $this->getWidgetMetaData($params['type']);

        $params['store_id'] = $this->_storeManager->getStore()->getId();

        $widget = ObjectManager::getInstance()->create($params['type'], ['params' => $params]);

        if ($widget instanceof \AlbertMage\PageBuilder\Model\Widget\LinkInterface) {

            return $widget->getLink();
        }

        if ($widget instanceof \AlbertMage\PageBuilder\Model\Widget\ProductListInterface) {

            return $widget->getProductList();
        }
        
        if ($widget instanceof \AlbertMage\PageBuilder\Model\Widget\BlockInterface) {
            return $widget->getBlock();
        }
        return [];
    }

    public function getWidgetMetaData($originClass)
    {
        return $this->widgetMetaData[$originClass] ?? $originClass;
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
