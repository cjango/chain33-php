<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: blockchain.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.Receipts</code>
 */
class Receipts extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .Jason.Chain33.Kernel.Protobuf.Receipt receipts = 1;</code>
     */
    private $receipts;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Jason\Chain33\Kernel\Protobuf\Receipt[]|\Google\Protobuf\Internal\RepeatedField $receipts
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Blockchain::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .Jason.Chain33.Kernel.Protobuf.Receipt receipts = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getReceipts()
    {
        return $this->receipts;
    }

    /**
     * Generated from protobuf field <code>repeated .Jason.Chain33.Kernel.Protobuf.Receipt receipts = 1;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\Receipt[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setReceipts($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Jason\Chain33\Kernel\Protobuf\Receipt::class);
        $this->receipts = $arr;

        return $this;
    }

}

