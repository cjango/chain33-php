<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: wallet.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.ReqPrivkeysFile</code>
 */
class ReqPrivkeysFile extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string fileName = 1;</code>
     */
    protected $fileName = '';
    /**
     * Generated from protobuf field <code>string passwd = 2;</code>
     */
    protected $passwd = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $fileName
     *     @type string $passwd
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Wallet::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string fileName = 1;</code>
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Generated from protobuf field <code>string fileName = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setFileName($var)
    {
        GPBUtil::checkString($var, True);
        $this->fileName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string passwd = 2;</code>
     * @return string
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * Generated from protobuf field <code>string passwd = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setPasswd($var)
    {
        GPBUtil::checkString($var, True);
        $this->passwd = $var;

        return $this;
    }

}
