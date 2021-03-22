<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: wallet.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.ReqWalletImportPrivkey</code>
 */
class ReqWalletImportPrivkey extends \Google\Protobuf\Internal\Message
{
    /**
     * bitcoin 的私钥格式
     *
     * Generated from protobuf field <code>string privkey = 1;</code>
     */
    protected $privkey = '';
    /**
     * Generated from protobuf field <code>string label = 2;</code>
     */
    protected $label = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $privkey
     *           bitcoin 的私钥格式
     *     @type string $label
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Wallet::initOnce();
        parent::__construct($data);
    }

    /**
     * bitcoin 的私钥格式
     *
     * Generated from protobuf field <code>string privkey = 1;</code>
     * @return string
     */
    public function getPrivkey()
    {
        return $this->privkey;
    }

    /**
     * bitcoin 的私钥格式
     *
     * Generated from protobuf field <code>string privkey = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setPrivkey($var)
    {
        GPBUtil::checkString($var, True);
        $this->privkey = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string label = 2;</code>
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Generated from protobuf field <code>string label = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setLabel($var)
    {
        GPBUtil::checkString($var, True);
        $this->label = $var;

        return $this;
    }

}

