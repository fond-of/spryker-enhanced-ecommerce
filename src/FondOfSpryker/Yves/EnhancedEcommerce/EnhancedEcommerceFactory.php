<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce;

use Spryker\Yves\Kernel\AbstractFactory;

class EnhancedEcommerceFactory extends AbstractFactory
{
    /**
     * @return array
     * @throws \Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getDataLayerExpanderPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::DATALAYER_EXPANDER_PLUGINS);
    }

    /**
     * @return array
     */
    public function getTwigParameterBagExpanderPlugins(): array
    {
        return $this->getProvidedDependency(EnhancedEcommerceDependencyProvider::TWIG_PARAMETER_BAG_EXPANDER_PLUGINS);
    }
}
