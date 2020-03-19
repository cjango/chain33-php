<?php

namespace Jason\Chain33\Wallet;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['wallet'] = static function ($app) {
            return new Client($app);
        };
    }

}
