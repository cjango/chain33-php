<?php

namespace Jason\Chain33\;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['manage'] = static function ($app) {
            return new Client($app);
        };
    }

}
