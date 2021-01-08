<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce\Plugin\Twig;

use FondOfSpryker\Shared\EnhancedEcommerce\EnhancedEcommerceConstants;
use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\TwigExtension\Dependency\Plugin\TwigPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig\Environment;
use Twig\TwigFunction;

/**
 * @method \FondOfSpryker\Yves\EnhancedEcommerce\EnhancedEcommerceFactory getFactory()
 */
class EnhancedEcommerceTwigPlugin extends AbstractPlugin implements TwigPluginInterface
{
    public const NEEDS_CONTEXT = 'needs_context';

    /**
     * Specification:
     * - Allows to extend Twig with additional functionality (e.g. functions, global variables, etc.).
     *
     * @api
     *
     * @param \Twig\Environment $twig
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Twig\Environment
     */
    public function extend(Environment $twig, ContainerInterface $container): Environment
    {
        return $this->registerEnhancedEcommerceTwigFunction($twig, $container);
    }

    /**
     * @param \Twig\Environment $twig
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Twig\Environment
     */
    protected function registerEnhancedEcommerceTwigFunction(Environment $twig, ContainerInterface $container): Environment
    {
        $twig->addFunction(
            new TwigFunction(EnhancedEcommerceConstants::TWIG_FUNCTION_ENHANCED_ECOMMERCE, null, [static::NEEDS_CONTEXT => true])
        );
    }
}
