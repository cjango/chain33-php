<?php

namespace Jason\Chain33\Kernel;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['client'] = static function ($app) {
            return new Client($app);
        };
    }

}
