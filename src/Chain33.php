<?php

namespace Jason;

use Illuminate\Support\Facades\Facade;

/**
 * Class Chain33
 * @package Jason
 * @method static Account Account
 * @method static Chain Chain
 * @method static Kernel Kernel
 * @method static Net Net
 * @method static Wallet Wallet
 */
class Chain33 extends Facade
{

    protected static function getFacadeAccessor()
    {
        return Chain33\Application::class;
    }

}
