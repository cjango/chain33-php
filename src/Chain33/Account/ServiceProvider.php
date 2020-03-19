<?php

namespace Jason\Chain33\Account;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app): void
    {
        $app['account'] = static function ($app) {
            return new Client($app);
        };
    }

}
