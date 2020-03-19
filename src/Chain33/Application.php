<?php

namespace Jason\Chain33;

use Pimple\Container;

class Application extends Container
{

    /**
     * 要注册的服务类
     * @var array
     */
    protected $providers = [
        Account\ServiceProvider::class,
        Balance\ServiceProvider::class,
        BlockChain\ServiceProvider::class,
        Exector\ServiceProvider::class,
        Kernel\ServiceProvider::class,
        Mempool\ServiceProvider::class,
        System\ServiceProvider::class,
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
     * @Date: 2020/3/17 20:44 下午
     * @param $name 服务名称
     * @return mixed
     */
    public function __get($name)
    {
        return $this->offsetGet(strtolower($name));
    }

    /**
     * Notes: 获取服务 $this->account($args)->do()
     * @Author: <C.Jason>
     * @Date: 2020/3/17 20:44 下午
     * @param $name 服务名称
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->offsetGet(strtolower($name));
    }

}
