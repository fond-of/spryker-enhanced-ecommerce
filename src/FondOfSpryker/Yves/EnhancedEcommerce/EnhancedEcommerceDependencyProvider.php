<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class EnhancedEcommerceDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FOS_ENHNACED_ECOMMERCE_RENDERER_PLUGINS = 'FOS_ENHNACED_ECOMMERCE_RENDERER_PLUGINS';
    public const FOS_ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS = 'FOS_ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS';
    public const FOS_ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS = 'FOS_ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS';

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

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addRendererPlugins(Container $container): Container
    {
        $container->set(static::FOS_ENHNACED_ECOMMERCE_RENDERER_PLUGINS, static function () {
            return $this->getRendererPlugins();
        });

        return $container;
    }

    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceRenderePluginInterface[]
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
        $container->set(static::FOS_ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS, static function () {
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
        $container->set(static::FOS_ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS, static function () {
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
