<?php

namespace Jason\Chain33\Transaction;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple): void
    {
        $pimple['transaction'] = static function ($app) {
            return new Client($app);
        };
    }

}
