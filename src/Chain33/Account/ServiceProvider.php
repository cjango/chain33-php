<?php

namespace Jason\Chain33\Account;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple): void
    {
        $pimple['account'] = static function ($app) {
            return new Client($app);
        };
    }

}
