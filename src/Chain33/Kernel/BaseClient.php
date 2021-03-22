<?php

namespace Jason\Chain33\Kernel;

use Jason\Chain33\Exceptions\ChainException;

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
     * @param  bool  $ticket  只解锁ticket
     * @return void
     */
    protected function unlock(bool $ticket = true): void
    {
        $res = $this->client->UnLock([
            'passwd'         => $this->config['password'],
            'walletOrTicket' => $ticket,
            'timeout'        => 0,
        ]);
    }

    /**
     * Notes   : 解析平行链的执行器地址
     * @Date   : 2021/3/22 2:48 下午
     * @Author : < Jason.C >
     * @param $execer
     * @return string
     * @throws \Jason\Chain33\Exceptions\ChainException
     */
    protected function parseExecer($execer)
    {
        if ($this->config['para_name']) {
            if (!preg_match('/user\.p\.[a-zA-Z0-9]*\./', $this->config['para_name'])) {
                throw new ChainException('平行链名称配置不正确');
            }

            return $this->config['para_name'] . $execer;
        } else {
            return $execer;
        }
    }

}
