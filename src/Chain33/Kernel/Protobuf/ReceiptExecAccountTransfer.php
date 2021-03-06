<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: account.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *账户余额改变的一个交易回报（合约内）
 *
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.ReceiptExecAccountTransfer</code>
 */
class ReceiptExecAccountTransfer extends \Google\Protobuf\Internal\Message
{
    /**
     *合约地址
     *
     * Generated from protobuf field <code>string execAddr = 1;</code>
     */
    protected $execAddr = '';
    /**
     *转移前
     *
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Account prev = 2;</code>
     */
    protected $prev = null;
    /**
     *转移后
     *
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Account current = 3;</code>
     */
    protected $current = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $execAddr
     *          合约地址
     *     @type \Jason\Chain33\Kernel\Protobuf\Account $prev
     *          转移前
     *     @type \Jason\Chain33\Kernel\Protobuf\Account $current
     *          转移后
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Account::initOnce();
        parent::__construct($data);
    }

    /**
     *合约地址
     *
     * Generated from protobuf field <code>string execAddr = 1;</code>
     * @return string
     */
    public function getExecAddr()
    {
        return $this->execAddr;
    }

    /**
     *合约地址
     *
     * Generated from protobuf field <code>string execAddr = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setExecAddr($var)
    {
        GPBUtil::checkString($var, True);
        $this->execAddr = $var;

        return $this;
    }

    /**
     *转移前
     *
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Account prev = 2;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\Account|null
     */
    public function getPrev()
    {
        return isset($this->prev) ? $this->prev : null;
    }

    public function hasPrev()
    {
        return isset($this->prev);
    }

    public function clearPrev()
    {
        unset($this->prev);
    }

    /**
     *转移前
     *
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Account prev = 2;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\Account $var
     * @return $this
     */
    public function setPrev($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\Account::class);
        $this->prev = $var;

        return $this;
    }

    /**
     *转移后
     *
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Account current = 3;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\Account|null
     */
    public function getCurrent()
    {
        return isset($this->current) ? $this->current : null;
    }

    public function hasCurrent()
    {
        return isset($this->current);
    }

    public function clearCurrent()
    {
        unset($this->current);
    }

    /**
     *转移后
     *
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Account current = 3;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\Account $var
     * @return $this
     */
    public function setCurrent($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\Account::class);
        $this->current = $var;

        return $this;
    }

}

