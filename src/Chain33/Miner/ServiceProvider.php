<?php

namespace Jason\Chain33\Miner;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['miner'] = static function ($app) {
            return new Client($app);
        };
    }

}
