<?php

namespace Jason\Chain33\Storage;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['storage'] = static function ($app) {
            return new Client($app);
        };
    }

}
