<?php

namespace Jason\Chain33\Exector;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['exector'] = static function ($app) {
            return new Client($app);
        };
    }

}
