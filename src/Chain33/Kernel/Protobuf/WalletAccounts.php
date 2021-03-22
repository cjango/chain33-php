<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: wallet.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.WalletAccounts</code>
 */
class WalletAccounts extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .Jason.Chain33.Kernel.Protobuf.WalletAccount wallets = 1;</code>
     */
    private $wallets;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Jason\Chain33\Kernel\Protobuf\WalletAccount[]|\Google\Protobuf\Internal\RepeatedField $wallets
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Wallet::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .Jason.Chain33.Kernel.Protobuf.WalletAccount wallets = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getWallets()
    {
        return $this->wallets;
    }

    /**
     * Generated from protobuf field <code>repeated .Jason.Chain33.Kernel.Protobuf.WalletAccount wallets = 1;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\WalletAccount[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setWallets($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Jason\Chain33\Kernel\Protobuf\WalletAccount::class);
        $this->wallets = $arr;

        return $this;
    }

}

