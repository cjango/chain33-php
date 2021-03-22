<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: blockchain.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *用于比较最优区块的消息结构
 *
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.CmpBlock</code>
 */
class CmpBlock extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Block block = 1;</code>
     */
    protected $block = null;
    /**
     * Generated from protobuf field <code>bytes cmpHash = 2;</code>
     */
    protected $cmpHash = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Jason\Chain33\Kernel\Protobuf\Block $block
     *     @type string $cmpHash
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Blockchain::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Block block = 1;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\Block|null
     */
    public function getBlock()
    {
        return isset($this->block) ? $this->block : null;
    }

    public function hasBlock()
    {
        return isset($this->block);
    }

    public function clearBlock()
    {
        unset($this->block);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Block block = 1;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\Block $var
     * @return $this
     */
    public function setBlock($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\Block::class);
        $this->block = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes cmpHash = 2;</code>
     * @return string
     */
    public function getCmpHash()
    {
        return $this->cmpHash;
    }

    /**
     * Generated from protobuf field <code>bytes cmpHash = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setCmpHash($var)
    {
        GPBUtil::checkString($var, False);
        $this->cmpHash = $var;

        return $this;
    }

}
