<?php

return [
    /**
     * 区块链版本，目前只能支持00版本的
     */
    'version'      => '00',

    /**
     * 服务器地址
     */
    'base_uri'     => '',

    /**
     * 服务器端口
     */
    'base_port'    => 8801,

    /**
     * 钱包密码，省的来回解锁了
     */
    'password'     => '',

    /**
     * 超级管理员 ，地址 和 私钥
     */
    'superManager' => [
        'address'    => '',
        'privateKey' => '',
    ],
];
