<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce;

use FondOfSpryker\Yves\EnhancedEcommerce\Twig\EnhancedEcommerceTwigExtension;
use FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceRenderePluginInterface;
use FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceRendererInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class EnhancedEcommerceFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceDataLayerExpanderPluginInterface[]
     */
    public function getDataLayerExpanderPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS);
    }

    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceTwigParameterBagExpanderPluginInterface[]
     */
    public function getTwigParameterBagExpanderPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS);
    }

    /**
     * @return EnhancedEcommerceRenderePluginInterface[]
     * @throws \Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getRendererPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::ENHNACED_ECOMMERCE_RENDERER_PLUGINS);
    }
}
