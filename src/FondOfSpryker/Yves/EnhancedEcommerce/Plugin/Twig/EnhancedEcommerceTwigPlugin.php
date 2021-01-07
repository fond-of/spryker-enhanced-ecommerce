<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce\Plugin\Twig;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\TwigExtension\Dependency\Plugin\TwigPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig\Environment;
use Twig\TwigFunction;
use Twig_Environment;

/**
 * @method \FondOfSpryker\Yves\EnhancedEcommerce\EnhancedEcommerceFactory getFactory()
 */
class EnhancedEcommerceTwigPlugin extends AbstractPlugin implements TwigPluginInterface
{
    public const TWIG_FUNCTION_ENHANCED_ECOMMERCE = 'enhancedEcommerce';

    /**
     * Specification:
     * - Allows to extend Twig with additional functionality (e.g. functions, global variables, etc.).
     *
     * @param \Twig\Environment $twig
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Twig\Environment
     * @api
     */
    public function extend(Environment $twig, ContainerInterface $container): Environment
    {
        return $this->registerEnhancedEcommerceTwigFunction($twig, $container);
    }

    /**
     * @param Environment $twig
     * @param ContainerInterface $container
     *
     * @return Environment
     */
    protected function registerEnhancedEcommerceTwigFunction(Environment $twig, ContainerInterface $container): Environment
    {
        $twig->addFunction(
            new TwigFunction(static::TWIG_FUNCTION_ENHANCED_ECOMMERCE, null, ['needs_context' => true])
        );
    }
}
