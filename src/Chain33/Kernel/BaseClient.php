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
     * 解锁钱包
     * @param bool $ticket 只解锁ticket
     * @return void
     */
    protected function unlock(bool $ticket = true): void
    {
        $this->client->UnLock([
            'passwd'         => $this->config['password'],
            'walletOrTicket' => $ticket,
            'timeout'        => 0,
        ]);
    }

}
