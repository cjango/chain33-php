<?php

namespace Jason\Chain33\NodeGroup;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['nodegroup'] = static function ($app) {
            return new Client($app);
        };
    }

}
