<?php

namespace Jason\Chain33\Paracross;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['paracross'] = static function ($app) {
            return new Client($app);
        };
    }

}
