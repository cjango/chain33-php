<?php

namespace Jason\Chain33\Retrieve;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['retrieve'] = static function ($app) {
            return new Client($app);
        };
    }

}
