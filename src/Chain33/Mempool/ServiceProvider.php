<?php

namespace Jason\Chain33\Mempool;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple): void
    {
        $pimple['mempool'] = static function ($app) {
            return new Client($app);
        };
    }

}
