<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: blockchain.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.PushWithStatus</code>
 */
class PushWithStatus extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.PushSubscribeReq push = 1;</code>
     */
    protected $push = null;
    /**
     * Generated from protobuf field <code>int32 status = 2;</code>
     */
    protected $status = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Jason\Chain33\Kernel\Protobuf\PushSubscribeReq $push
     *     @type int $status
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Blockchain::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.PushSubscribeReq push = 1;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\PushSubscribeReq|null
     */
    public function getPush()
    {
        return isset($this->push) ? $this->push : null;
    }

    public function hasPush()
    {
        return isset($this->push);
    }

    public function clearPush()
    {
        unset($this->push);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.PushSubscribeReq push = 1;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\PushSubscribeReq $var
     * @return $this
     */
    public function setPush($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\PushSubscribeReq::class);
        $this->push = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 status = 2;</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Generated from protobuf field <code>int32 status = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkInt32($var);
        $this->status = $var;

        return $this;
    }

}
