<?php

namespace Jason\Chain33\Net;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['net'] = static function ($app) {
            return new Client($app);
        };
    }

}
