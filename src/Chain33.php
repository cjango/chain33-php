<?php

namespace Jason;

use Illuminate\Support\Facades\Facade;

/**
 * Class Chain33
 * @package Jason
 * @method static Chain33\Account\Client Account
 * @method static Chain33\Balance\Client Balance
 * @method static Chain33\Chain\Client Chain
 * @method static Chain33\Evm\Client Evm
 * @method static Chain33\Manage\Client Manage
 * @method static Chain33\Mempool\Client Mempool
 * @method static Chain33\Miner\Client Miner
 * @method static Chain33\Net\Client Net
 * @method static Chain33\Oracle\Client Oracle
 * @method static Chain33\Storage\Client Storage
 * @method static Chain33\Token\Client Token
 * @method static Chain33\Transaction\Client Transaction
 * @method static Chain33\Wallet\Client Wallet
 * 组合的请求方式
 * @method static isSync()
 * @method static newAccountLocal()
 */
class Chain33 extends Facade
{

    protected static function getFacadeAccessor()
    {
        return Chain33\Application::class;
    }

}
