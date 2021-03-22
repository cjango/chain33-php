<?php

return [
    /**
     * 区块链版本，目前只能支持00版本的
     */
    'version'       => '00',

    /**
     * 服务器地址
     */
    'base_uri'      => env('BLOCK_CHAIN_URI', '127.0.0.1'),

    /**
     * 服务器端口
     */
    'base_port'     => env('BLOCK_CHAIN_PORT', 8801),

    /**
     * 钱包密码，省的来回解锁了
     */
    'password'      => env('BLOCK_CHAIN_PASSWORD', ''),

    /**
     * 平行链名称 user.p.XXX.
     */
    'para_name'     => env('BLOCK_CHAIN_PARA_NAME', ''),

    /**
     * 平行链交易代扣地址
     */
    'para_pay_addr' => env('BLOCK_CHAIN_PAY_ADDR', ''),

    /**
     * 超级管理员 ，地址 和 私钥
     */
    'superManager'  => [
        'address'    => env('BLOCK_CHAIN_MANAGER_ADDRESS', ''),
        'privateKey' => env('BLOCK_CHAIN_MANAGER_KEY', ''),
    ],
];