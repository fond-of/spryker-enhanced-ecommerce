<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce;

use Spryker\Yves\Kernel\AbstractFactory;

class EnhancedEcommerceFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceDataLayerExpanderPluginInterface[]
     */
    public function getDataLayerExpanderPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::FOS_ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS);
    }

    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceTwigParameterBagExpanderPluginInterface[]
     */
    public function getTwigParameterBagExpanderPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::FOS_ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS);
    }

    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceRenderePluginInterface[]
     */
    public function getRendererPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::FOS_ENHNACED_ECOMMERCE_RENDERER_PLUGINS);
    }
}
