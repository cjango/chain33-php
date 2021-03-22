<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: wallet.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *钱包模块通过一个随机值对钱包密码加密
 *   pwHash : 对钱包密码和一个随机值组合进行哈希计算
 *   randstr :对钱包密码加密的一个随机值
 *
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.WalletPwHash</code>
 */
class WalletPwHash extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>bytes pwHash = 1;</code>
     */
    protected $pwHash = '';
    /**
     * Generated from protobuf field <code>string randstr = 2;</code>
     */
    protected $randstr = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $pwHash
     *     @type string $randstr
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Wallet::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>bytes pwHash = 1;</code>
     * @return string
     */
    public function getPwHash()
    {
        return $this->pwHash;
    }

    /**
     * Generated from protobuf field <code>bytes pwHash = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setPwHash($var)
    {
        GPBUtil::checkString($var, False);
        $this->pwHash = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string randstr = 2;</code>
     * @return string
     */
    public function getRandstr()
    {
        return $this->randstr;
    }

    /**
     * Generated from protobuf field <code>string randstr = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setRandstr($var)
    {
        GPBUtil::checkString($var, True);
        $this->randstr = $var;

        return $this;
    }

}

