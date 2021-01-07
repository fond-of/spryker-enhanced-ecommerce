<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class EnhancedEcommerceDependencyProvider extends AbstractBundleDependencyProvider
{
    public const ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS = 'ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS';
    public const ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS = 'ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS';
    public const ENHNACED_ECOMMERCE_CONTROLLER_EVENT_HANDLER = 'ENHNACED_ECOMMERCE_CONTROLLER_EVENT_HANDLER';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = $this->addEnhancedEcommerceDataLayerExpanderPlugins($container);
        $container = $this->addEnhancedEcommerceTwigParameterBagExpanderPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addEnhancedEcommerceDataLayerExpanderPlugins(Container $container): Container
    {
        $container->set(static::ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS, function () {
            return $this->getEnhancedEcommerceDataLayerExpanderPlugins();
        });

        return $container;
    }

    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceDataLayerExpanderPluginInterface[]
     */
    protected function getEnhancedEcommerceDataLayerExpanderPlugins(): array
    {
        return [];
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addEnhancedEcommerceTwigParameterBagExpanderPlugins(Container $container): Container
    {
        $container->set(static::ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS, function () {
            return $this->getEnhancedEcommerceTwigParameterBagExpanderPlugins();
        });

        return $container;
    }

    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceTwigParameterBagExpanderPluginInterface[]
     */
    protected function getEnhancedEcommerceTwigParameterBagExpanderPlugins(): array
    {
        return [];
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addControllerEventHandler(Container $container): Container
    {
        $container->set(static::ENHNACED_ECOMMERCE_CONTROLLER_EVENT_HANDLER, function () {
            return $this->getControllerEventHandler();
        });

        return $container;
    }

    /**
     * @return array
     */
    protected function getControllerEventHandler(): array
    {
        return [];
    }
}
