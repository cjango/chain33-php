<?php

namespace Jason\Chain33\Unfreeze;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['unfreeze'] = static function ($app) {
            return new Client($app);
        };
    }

}
