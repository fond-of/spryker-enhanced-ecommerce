<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce;

use Codeception\Test\Unit;
use Spryker\Yves\Kernel\Container;

class EnhancedEcommerceFactoryTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Yves\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \FondOfSpryker\Yves\EnhancedEcommerce\EnhancedEcommerceFactory
     */
    protected $factory;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->factory = new EnhancedEcommerceFactory();
        $this->factory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testGetDataLayerExpanderPlugins(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->with(EnhancedEcommerceDependencyProvider::FOS_ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS)
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(EnhancedEcommerceDependencyProvider::FOS_ENHNACED_ECOMMERCE_DATALAYER_EXPANDER_PLUGINS)
            ->willReturn([]);

        $this->factory->getDataLayerExpanderPlugins();
    }

    /**
     * @return void
     */
    public function testGetTwigParameterBagExpanderPlugins(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->with(EnhancedEcommerceDependencyProvider::FOS_ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS)
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(EnhancedEcommerceDependencyProvider::FOS_ENHNACED_ECOMMERCE_TWIG_PARAMETER_BAG_EXPANDER_PLUGINS)
            ->willReturn([]);

        $this->factory->getTwigParameterBagExpanderPlugins();
    }

    /**
     * @return void
     */
    public function testGetRendererPlugins(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->with(EnhancedEcommerceDependencyProvider::FOS_ENHNACED_ECOMMERCE_RENDERER_PLUGINS)
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(EnhancedEcommerceDependencyProvider::FOS_ENHNACED_ECOMMERCE_RENDERER_PLUGINS)
            ->willReturn([]);

        $this->factory->getRendererPlugins();
    }
}
