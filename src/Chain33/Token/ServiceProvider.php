<?php

namespace Jason\Chain33\Token;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple): void
    {
        $pimple['token'] = static function ($app) {
            return new Client($app);
        };
    }

}
