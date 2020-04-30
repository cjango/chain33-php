<?php

namespace Jason\Chain33\Chain;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['chain'] = static function ($app) {
            return new Client($app);
        };
    }

}
