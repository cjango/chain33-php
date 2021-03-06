<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: account.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.ExecAccount</code>
 */
class ExecAccount extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string execer = 1;</code>
     */
    protected $execer = '';
    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Account account = 2;</code>
     */
    protected $account = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $execer
     *     @type \Jason\Chain33\Kernel\Protobuf\Account $account
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Account::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string execer = 1;</code>
     * @return string
     */
    public function getExecer()
    {
        return $this->execer;
    }

    /**
     * Generated from protobuf field <code>string execer = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setExecer($var)
    {
        GPBUtil::checkString($var, True);
        $this->execer = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Account account = 2;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\Account|null
     */
    public function getAccount()
    {
        return isset($this->account) ? $this->account : null;
    }

    public function hasAccount()
    {
        return isset($this->account);
    }

    public function clearAccount()
    {
        unset($this->account);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.Account account = 2;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\Account $var
     * @return $this
     */
    public function setAccount($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\Account::class);
        $this->account = $var;

        return $this;
    }

}

