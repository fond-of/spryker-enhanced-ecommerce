<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce\Twig;

use Spryker\Yves\Twig\Plugin\AbstractTwigExtensionPlugin;
use Twig\Environment;
use Twig_SimpleFunction;

/**
 * @method \FondOfSpryker\Yves\EnhancedEcommerce\EnhancedEcommerceFactory getFactory()
 */
class EnhancedEcommerceTwigExtension extends AbstractTwigExtensionPlugin
{
    public const FUNCTION_ENHANCED_ECOMMERCE = 'enhancedEcommerce';

    /**
     * @return array
     */
    public function getFunctions(): array
    {
        return [];
    }

    /**
     * @return \Twig_SimpleFunction
     */
    protected function createEnhancedEcommerceFunction(): Twig_SimpleFunction
    {
        return new Twig_SimpleFunction(
            static::FUNCTION_ENHANCED_ECOMMERCE,
            [$this, 'renderEnhancedEcommerce'],
            [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]
        );
    }

    /**
     * @param \Twig\Environment $twig
     * @param string $page
     * @param array $params
     *
     * @return string
     */
    public function renderEnhancedEcommerce(Environment $twig, $page, $params): string
    {
        $dataLayerVariables = [];

        foreach ($this->getFactory()->getTwigParameterBagExpanderPlugins() as $twigVariableBagExpanderPlugin) {
        }

        foreach ($this->getFactory()->getDataLayerExpanderPlugins() as $type => $dataLayerExpanderPlugin) {
        }

        return $twig->render($this->getDataLayerTemplateName(), [
            'data' => $dataLayerVariables,
        ]);
    }

    /**
     * @return string
     */
    protected function getDataLayerTemplateName(): string
    {
        return '@EnhancedEcommerce/partials/data-layer.twig';
    }
}
