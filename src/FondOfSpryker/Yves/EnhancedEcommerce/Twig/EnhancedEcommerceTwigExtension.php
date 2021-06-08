<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce\Twig;

use FondOfSpryker\Shared\EnhancedEcommerce\EnhancedEcommerceConstants;
use Spryker\Yves\Twig\Plugin\AbstractTwigExtensionPlugin;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig_SimpleFunction;

/**
 * @method \FondOfSpryker\Yves\EnhancedEcommerce\EnhancedEcommerceFactory getFactory()
 */
class EnhancedEcommerceTwigExtension extends AbstractTwigExtensionPlugin
{
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
            EnhancedEcommerceConstants::TWIG_FUNCTION_ENHANCED_ECOMMERCE,
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
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param array $twigVariableBag
     *
     * @return string
     */
    public function renderEnhancedEcommerce(Environment $twig, string $page, Request $request, array $twigVariableBag): string
    {
        $twigVariableBag = $this->executeTwigParameterBagExpanderPlugins($page, $twigVariableBag);
        $dataLayer = $this->executeDataLayerExpanderPlugins($page, $twigVariableBag);
        $renderedJavascript = $this->executeRendererPlugins($twig, $page, $twigVariableBag);

        return $twig->render($this->getDataLayerTemplateName(), [
            'dataLayer' => $dataLayer,
            'javascript' => $renderedJavascript,
        ]);
    }

    /**
     * @param string $page
     * @param array $twigVariableBag
     *
     * @return array
     */
    protected function executeTwigParameterBagExpanderPlugins(string $page, array $twigVariableBag): array
    {
        foreach ($this->getFactory()->getTwigParameterBagExpanderPlugins() as $twigVariableBagExpanderPlugin) {
            if ($twigVariableBagExpanderPlugin->isApplicable($page, $twigVariableBag)) {
                $twigVariableBag = $twigVariableBagExpanderPlugin->expand($twigVariableBag);
            }
        }

        return $twigVariableBag;
    }

    /**
     * @param string $page
     * @param array $twigVariableBag
     *
     * @return array
     */
    protected function executeDataLayerExpanderPlugins(string $page, array $twigVariableBag): array
    {
        $dataLayer = [];

        foreach ($this->getFactory()->getDataLayerExpanderPlugins() as $dataLayerExpanderPlugin) {
            if ($dataLayerExpanderPlugin->isApplicable($page, $twigVariableBag)) {
                $dataLayer[] = $dataLayerExpanderPlugin->expand($page, $twigVariableBag, $dataLayer);
            }
        }

        return $dataLayer;
    }

    /**
     * @param \Twig\Environment $twig
     * @param string $page
     * @param array $twigVariableBag
     *
     * @return string
     */
    protected function executeRendererPlugins(Environment $twig, string $page, array $twigVariableBag): string
    {
        $renderedJavascript = '';

        foreach ($this->getFactory()->getRendererPlugins() as $dataLayerExpanderPlugin) {
            if ($dataLayerExpanderPlugin->isApplicable($page, $twigVariableBag)) {
                $renderedJavascript .= $dataLayerExpanderPlugin->render($twig, $page, $twigVariableBag);
            }
        }

        return $renderedJavascript;
    }

    /**
     * @return string
     */
    protected function getDataLayerTemplateName(): string
    {
        return '@EnhancedEcommerce/partials/data-layer.twig';
    }
}
