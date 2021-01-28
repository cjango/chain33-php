<?php

namespace Jason\Chain33\Kernel;

class BaseClient
{

    protected $app;

    /**
     * 配置信息
     */
    protected $config;

    /**
     * 基础请求
     */
    protected $client;

    public function __construct($app)
    {
        $this->app    = $app;
        $this->config = $app->config;
        $this->client = $app->client;
    }

    /**
     * Notes   : 钱包加锁
     * @Date   : 2021/1/28 11:23 上午
     * @Author : < Jason.C >
     * @return bool
     */
    public function lock(): bool
    {
        return $this->client->Lock()['isOK'];
    }

    /**
     * Notes   : 解锁钱包
     * @Date   : 2021/1/28 11:23 上午
     * @Author : < Jason.C >
     * @param  bool  $ticket   true，只解锁ticket买票功能，false：解锁整个钱包
     * @param  int   $timeout  超时时间
     * @return bool
     */
    protected function unlock(bool $ticket = false, int $timeout = 0): bool
    {
        return $this->client->UnLock([
            'passwd'         => $this->config['password'],
            'walletOrTicket' => $ticket,
            'timeout'        => $timeout,
        ])['isOK'];
    }

}
