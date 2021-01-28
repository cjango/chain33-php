<?php

namespace Jason\Chain33\Manage;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple): void
    {
        $pimple['manage'] = static function ($app) {
            return new Client($app);
        };
    }

}
