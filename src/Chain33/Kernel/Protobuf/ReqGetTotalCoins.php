<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: statistic.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *查询symbol代币总额
 *
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.ReqGetTotalCoins</code>
 */
class ReqGetTotalCoins extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string symbol = 1;</code>
     */
    protected $symbol = '';
    /**
     * Generated from protobuf field <code>bytes stateHash = 2;</code>
     */
    protected $stateHash = '';
    /**
     * Generated from protobuf field <code>bytes startKey = 3;</code>
     */
    protected $startKey = '';
    /**
     * Generated from protobuf field <code>int64 count = 4;</code>
     */
    protected $count = 0;
    /**
     * Generated from protobuf field <code>string execer = 5;</code>
     */
    protected $execer = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $symbol
     *     @type string $stateHash
     *     @type string $startKey
     *     @type int|string $count
     *     @type string $execer
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Statistic::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string symbol = 1;</code>
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Generated from protobuf field <code>string symbol = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setSymbol($var)
    {
        GPBUtil::checkString($var, True);
        $this->symbol = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes stateHash = 2;</code>
     * @return string
     */
    public function getStateHash()
    {
        return $this->stateHash;
    }

    /**
     * Generated from protobuf field <code>bytes stateHash = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setStateHash($var)
    {
        GPBUtil::checkString($var, False);
        $this->stateHash = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes startKey = 3;</code>
     * @return string
     */
    public function getStartKey()
    {
        return $this->startKey;
    }

    /**
     * Generated from protobuf field <code>bytes startKey = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setStartKey($var)
    {
        GPBUtil::checkString($var, False);
        $this->startKey = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 count = 4;</code>
     * @return int|string
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Generated from protobuf field <code>int64 count = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCount($var)
    {
        GPBUtil::checkInt64($var);
        $this->count = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string execer = 5;</code>
     * @return string
     */
    public function getExecer()
    {
        return $this->execer;
    }

    /**
     * Generated from protobuf field <code>string execer = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setExecer($var)
    {
        GPBUtil::checkString($var, True);
        $this->execer = $var;

        return $this;
    }

}

