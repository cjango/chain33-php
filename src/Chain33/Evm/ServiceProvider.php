<?php

namespace Jason\Chain33\Evm;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['evm'] = static function ($app) {
            return new Client($app);
        };
    }

}
