<?php

namespace Jason\Chain33\Wallet;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple): void
    {
        $pimple['wallet'] = static function ($app) {
            return new Client($app);
        };
    }

}
