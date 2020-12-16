<?php

namespace FondOfSpryker\Yves\EnhancedEcommerce\Plugin;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_Environment;

/**
 * @method \FondOfSpryker\Yves\EnhancedEcommerce\EnhancedEcommerceFactory getFactory()
 */
class EnhancedEcommerceTwigServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{
    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Application $app)
    {
        $enhancedEcommerceTwigExtension = $this->getFactory()
            ->createEnhancedEcommerceTwigExtension();

        $app['twig'] = $app->extend(
            'twig',
            function (Twig_Environment $twig) use ($enhancedEcommerceTwigExtension, $app) {
                $twig->addExtension($enhancedEcommerceTwigExtension);

                return $twig;
            }
        );
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     *
     * @return void
     */
    public function boot(Application $app)
    {
        // TODO: Implement boot() method.
    }
}
