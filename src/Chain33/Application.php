<?php

namespace Jason\Chain33;

use Pimple\Container;

/**
 * Class Application
 * @package Jason\Chain33
 * @method static Account\Client Account
 * @method static Balance\Client Balance
 * @method static Chain\Client Chain
 * @method static Evm\Client Evm
 * @method static Mempool\Client Mempool
 * @method static Miner\Client Miner
 * @method static Net\Client Net
 * @method static Oracle\Client Oracle
 * @method static Storage\Client Storage
 * @method static Token\Client Token
 * @method static Transaction\Client Transaction
 * @method static Wallet\Client Wallet
 * 组合的请求方式
 * @method static newAccountLocal()
 */
class Application extends Container
{

    /**
     * 要注册的服务类
     * @var array
     */
    protected $providers = [
        Account\ServiceProvider::class,
        Balance\ServiceProvider::class,
        Chain\ServiceProvider::class,
        Evm\ServiceProvider::class,
        Kernel\ServiceProvider::class,
        Manage\ServiceProvider::class,
        Mempool\ServiceProvider::class,
        Miner\ServiceProvider::class,
        Net\ServiceProvider::class,
        Oracle\ServiceProvider::class,
        Storage\ServiceProvider::class,
        Token\ServiceProvider::class,
        Transaction\ServiceProvider::class,
        Wallet\ServiceProvider::class,
    ];

    /**
     * Application constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this['config'] = static function () {
            return config('chain33');
        };
        $this->registerProviders();
    }

    /**
     * Register providers.
     */
    protected function registerProviders(): void
    {
        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }

    /**
     * 获取服务 $this->account->do()
     * @Author: <C.Jason>
     * @Date  : 2020/3/17 20:44 下午
     * @param  string  $name  服务名称
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->offsetGet(strtolower($name));
    }

    /**
     * Notes: 获取服务 $this->account($args)->do()
     * @Author: <C.Jason>
     * @Date  : 2020/3/17 20:44 下午
     * @param  string  $name  服务名称
     * @param          $arguments
     * @return mixed
     */
    public function __call(string $name, $arguments)
    {
        return $this->offsetGet(strtolower($name));
    }

}
