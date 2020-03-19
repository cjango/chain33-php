<?php

namespace Jason\Chain33\Multisig;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['Multisig'] = static function ($app) {
            return new Client($app);
        };
    }

}
