<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: account.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Account 的信息
 *
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.Account</code>
 */
class Account extends \Google\Protobuf\Internal\Message
{
    /**
     * coins标识，目前只有0 一个值
     *
     * Generated from protobuf field <code>int32 currency = 1;</code>
     */
    protected $currency = 0;
    /**
     *账户可用余额
     *
     * Generated from protobuf field <code>int64 balance = 2;</code>
     */
    protected $balance = 0;
    /**
     *账户冻结余额
     *
     * Generated from protobuf field <code>int64 frozen = 3;</code>
     */
    protected $frozen = 0;
    /**
     *账户的地址
     *
     * Generated from protobuf field <code>string addr = 4;</code>
     */
    protected $addr = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $currency
     *           coins标识，目前只有0 一个值
     *     @type int|string $balance
     *          账户可用余额
     *     @type int|string $frozen
     *          账户冻结余额
     *     @type string $addr
     *          账户的地址
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Account::initOnce();
        parent::__construct($data);
    }

    /**
     * coins标识，目前只有0 一个值
     *
     * Generated from protobuf field <code>int32 currency = 1;</code>
     * @return int
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * coins标识，目前只有0 一个值
     *
     * Generated from protobuf field <code>int32 currency = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setCurrency($var)
    {
        GPBUtil::checkInt32($var);
        $this->currency = $var;

        return $this;
    }

    /**
     *账户可用余额
     *
     * Generated from protobuf field <code>int64 balance = 2;</code>
     * @return int|string
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     *账户可用余额
     *
     * Generated from protobuf field <code>int64 balance = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setBalance($var)
    {
        GPBUtil::checkInt64($var);
        $this->balance = $var;

        return $this;
    }

    /**
     *账户冻结余额
     *
     * Generated from protobuf field <code>int64 frozen = 3;</code>
     * @return int|string
     */
    public function getFrozen()
    {
        return $this->frozen;
    }

    /**
     *账户冻结余额
     *
     * Generated from protobuf field <code>int64 frozen = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setFrozen($var)
    {
        GPBUtil::checkInt64($var);
        $this->frozen = $var;

        return $this;
    }

    /**
     *账户的地址
     *
     * Generated from protobuf field <code>string addr = 4;</code>
     * @return string
     */
    public function getAddr()
    {
        return $this->addr;
    }

    /**
     *账户的地址
     *
     * Generated from protobuf field <code>string addr = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setAddr($var)
    {
        GPBUtil::checkString($var, True);
        $this->addr = $var;

        return $this;
    }

}

