<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: transaction.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.ReqGetMempool</code>
 */
class ReqGetMempool extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>bool isAll = 1;</code>
     */
    protected $isAll = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $isAll
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Transaction::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>bool isAll = 1;</code>
     * @return bool
     */
    public function getIsAll()
    {
        return $this->isAll;
    }

    /**
     * Generated from protobuf field <code>bool isAll = 1;</code>
     * @param bool $var
     * @return $this
     */
    public function setIsAll($var)
    {
        GPBUtil::checkBool($var);
        $this->isAll = $var;

        return $this;
    }

}

