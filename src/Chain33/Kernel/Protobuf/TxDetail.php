<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: blockchain.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *交易的详情：
 * index:本交易在block中索引值，用于proof的证明
 * tx:本交易内容
 * receipt:本交易在主链的执行回执
 * proofs:本交易hash在block中merkel中的路径
 *
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.TxDetail</code>
 */
class TxDetail extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint32 index = 1;</code>
     */
    protected $index = 0;
    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Transaction tx = 2;</code>
     */
    protected $tx = null;
    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.ReceiptData receipt = 3;</code>
     */
    protected $receipt = null;
    /**
     * Generated from protobuf field <code>repeated bytes proofs = 4;</code>
     */
    private $proofs;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $index
     *     @type \Jason\Chain33\Kernel\Protobuf\Transaction $tx
     *     @type \Jason\Chain33\Kernel\Protobuf\ReceiptData $receipt
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $proofs
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Blockchain::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint32 index = 1;</code>
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Generated from protobuf field <code>uint32 index = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setIndex($var)
    {
        GPBUtil::checkUint32($var);
        $this->index = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Transaction tx = 2;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\Transaction|null
     */
    public function getTx()
    {
        return isset($this->tx) ? $this->tx : null;
    }

    public function hasTx()
    {
        return isset($this->tx);
    }

    public function clearTx()
    {
        unset($this->tx);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Transaction tx = 2;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\Transaction $var
     * @return $this
     */
    public function setTx($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\Transaction::class);
        $this->tx = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.ReceiptData receipt = 3;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\ReceiptData|null
     */
    public function getReceipt()
    {
        return isset($this->receipt) ? $this->receipt : null;
    }

    public function hasReceipt()
    {
        return isset($this->receipt);
    }

    public function clearReceipt()
    {
        unset($this->receipt);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.ReceiptData receipt = 3;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\ReceiptData $var
     * @return $this
     */
    public function setReceipt($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\ReceiptData::class);
        $this->receipt = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated bytes proofs = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getProofs()
    {
        return $this->proofs;
    }

    /**
     * Generated from protobuf field <code>repeated bytes proofs = 4;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setProofs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::BYTES);
        $this->proofs = $arr;

        return $this;
    }

}

