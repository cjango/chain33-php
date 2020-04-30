<?php

namespace Jason\Chain33\Kernel;

class BaseClient
{

    protected $app;

    protected $config;

    protected $client;

    public function __construct($app)
    {
        $this->app    = $app;
        $this->config = $app->config;
        $this->client = $app->client;
    }

    /**
     * Notes: 解锁钱包
     * @Author: <C.Jason>
     * @Date: 2020/4/30 17:30
     * @param bool $ticket 解锁整个钱包
     */
    protected function unlock(bool $ticket = true): void
    {
        $this->client->UnLock([
            'passwd'         => $this->config['password'],
            'walletOrTicket' => $ticket,
            'timeout'        => 5,
        ]);
    }

}
