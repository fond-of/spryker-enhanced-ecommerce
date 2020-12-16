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
     * @return array
     */
    public function getDataLayerExpanderPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS);
    }

    /**
     * @return array
     */
    public function getTwigParameterBagExpanderPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS);
    }
}
