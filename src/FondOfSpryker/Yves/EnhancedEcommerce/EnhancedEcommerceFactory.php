<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce;

use FondOfSpryker\Yves\EnhancedEcommerce\Twig\EnhancedEcommerceTwigExtension;
use Spryker\Yves\Kernel\AbstractFactory;

class EnhancedEcommerceFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerce\Twig\EnhancedEcommerceTwigExtension
     */
    public function createEnhancedEcommerceTwigExtension(): EnhancedEcommerceTwigExtension
    {
        return new EnhancedEcommerceTwigExtension();
    }

    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceDataLayerExpanderPluginInterface[]
     */
    public function getEnhancedEcommerceDataLayerExpanderPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS);
    }

    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceTwigParameterBagExpanderPluginInterface[]
     */
    public function getEnhancedEcommerceTwigParameterBagExpanderPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS);
    }
}
