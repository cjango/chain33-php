<?php

namespace Jason\Chain33\Balance;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple): void
    {
        $pimple['balance'] = static function ($app) {
            return new Client($app);
        };
    }

}
