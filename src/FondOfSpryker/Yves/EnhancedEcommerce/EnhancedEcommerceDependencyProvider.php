<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce;

use FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceRenderePluginInterface;
use FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceRendererInterface;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class EnhancedEcommerceDependencyProvider extends AbstractBundleDependencyProvider
{
    public const ENHNACED_ECOMMERCE_RENDERER_PLUGINS = 'ENHNACED_ECOMMERCE_RENDERER_PLUGINS';
    public const ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS = 'ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS';
    public const ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS = 'ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = $this->addDataLayerExpanderPlugins($container);
        $container = $this->addTwigParameterBagExpanderPlugins($container);
        $container = $this->addRendererPlugins($container);

        return $container;
    }

    protected function addRendererPlugins(Container $container): Container
    {
        $container->set(static::ENHNACED_ECOMMERCE_RENDERER_PLUGINS, function () {
            return $this->getRendererPlugins();
        });

        return $container;
    }

    /**
     * @return EnhancedEcommerceRenderePluginInterface[]
     */
    protected function getRendererPlugins(): array
    {
        return [];
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addDataLayerExpanderPlugins(Container $container): Container
    {
        $container->set(static::ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS, function () {
            return $this->getDataLayerExpanderPlugins();
        });

        return $container;
    }

    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceDataLayerExpanderPluginInterface[]
     */
    protected function getDataLayerExpanderPlugins(): array
    {
        return [];
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addTwigParameterBagExpanderPlugins(Container $container): Container
    {
        $container->set(static::ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS, function () {
            return $this->getTwigParameterBagExpanderPlugins();
        });

        return $container;
    }

    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceTwigParameterBagExpanderPluginInterface[]
     */
    protected function getTwigParameterBagExpanderPlugins(): array
    {
        return [];
    }
}
