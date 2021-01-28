<?php

namespace Jason\Chain33\System;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple): void
    {
        $pimple['system'] = static function ($app) {
            return new Client($app);
        };
    }

}
