<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce\Twig;

use Spryker\Yves\Twig\Plugin\AbstractTwigExtensionPlugin;
use Symfony\Component\HttpFoundation\Request;
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
        return [
            $this->createEnhancedEcommerceFunction(),
        ];
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
    public function renderEnhancedEcommerce(Environment $twig, string $page, Request $request, array $twigVariableBag): string
    {
        $renderedJavascript = '';
        $dataLayer = [];

        foreach ($this->getFactory()->getTwigParameterBagExpanderPlugins() as $twigVariableBagExpanderPlugin) {
            if ($twigVariableBagExpanderPlugin->isApplicable($page, $twigVariableBag)) {
                $twigVariableBag = $twigVariableBagExpanderPlugin->expand($twigVariableBag);
            }
        }

        foreach ($this->getFactory()->getDataLayerExpanderPlugins() as $dataLayerExpanderPlugin) {
            if ($dataLayerExpanderPlugin->isApplicable($page, $twigVariableBag)) {
                $dataLayer[] = $dataLayerExpanderPlugin->expand($page, $twigVariableBag, $dataLayer);
            }
        }

        foreach ($this->getFactory()->getRendererPlugins() as $dataLayerExpanderPlugin) {
            if ($dataLayerExpanderPlugin->isApplicable($page, $twigVariableBag)) {
                $renderedJavascript .= $dataLayerExpanderPlugin->render($twig, $page, $twigVariableBag);
            }
        }

        return $twig->render($this->getDataLayerTemplateName(), [
            'dataLayer' => $dataLayer,
            'javascript' => $renderedJavascript,
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
