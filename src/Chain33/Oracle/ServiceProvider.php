<?php

namespace Jason\Chain33\Oracle;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple): void
    {
        $pimple['oracle'] = static function ($app) {
            return new Client($app);
        };
    }

}
