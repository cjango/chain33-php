<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: storage.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *后面如果有其他数据模型可继续往上面添加
 *
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.Storage</code>
 */
class Storage extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 ty = 7;</code>
     */
    protected $ty = 0;
    protected $value;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Jason\Chain33\Kernel\Protobuf\ContentOnlyNotaryStorage $contentStorage
     *     @type \Jason\Chain33\Kernel\Protobuf\HashOnlyNotaryStorage $hashStorage
     *     @type \Jason\Chain33\Kernel\Protobuf\LinkNotaryStorage $linkStorage
     *     @type \Jason\Chain33\Kernel\Protobuf\EncryptNotaryStorage $encryptStorage
     *     @type \Jason\Chain33\Kernel\Protobuf\EncryptShareNotaryStorage $encryptShareStorage
     *     @type \Jason\Chain33\Kernel\Protobuf\EncryptNotaryAdd $encryptAdd
     *     @type int $ty
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Storage::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.ContentOnlyNotaryStorage contentStorage = 1;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\ContentOnlyNotaryStorage|null
     */
    public function getContentStorage()
    {
        return $this->readOneof(1);
    }

    public function hasContentStorage()
    {
        return $this->hasOneof(1);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.ContentOnlyNotaryStorage contentStorage = 1;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\ContentOnlyNotaryStorage $var
     * @return $this
     */
    public function setContentStorage($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\ContentOnlyNotaryStorage::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.HashOnlyNotaryStorage hashStorage = 2;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\HashOnlyNotaryStorage|null
     */
    public function getHashStorage()
    {
        return $this->readOneof(2);
    }

    public function hasHashStorage()
    {
        return $this->hasOneof(2);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.HashOnlyNotaryStorage hashStorage = 2;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\HashOnlyNotaryStorage $var
     * @return $this
     */
    public function setHashStorage($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\HashOnlyNotaryStorage::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.LinkNotaryStorage linkStorage = 3;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\LinkNotaryStorage|null
     */
    public function getLinkStorage()
    {
        return $this->readOneof(3);
    }

    public function hasLinkStorage()
    {
        return $this->hasOneof(3);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.LinkNotaryStorage linkStorage = 3;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\LinkNotaryStorage $var
     * @return $this
     */
    public function setLinkStorage($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\LinkNotaryStorage::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.EncryptNotaryStorage encryptStorage = 4;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\EncryptNotaryStorage|null
     */
    public function getEncryptStorage()
    {
        return $this->readOneof(4);
    }

    public function hasEncryptStorage()
    {
        return $this->hasOneof(4);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.EncryptNotaryStorage encryptStorage = 4;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\EncryptNotaryStorage $var
     * @return $this
     */
    public function setEncryptStorage($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\EncryptNotaryStorage::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.EncryptShareNotaryStorage encryptShareStorage = 5;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\EncryptShareNotaryStorage|null
     */
    public function getEncryptShareStorage()
    {
        return $this->readOneof(5);
    }

    public function hasEncryptShareStorage()
    {
        return $this->hasOneof(5);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.EncryptShareNotaryStorage encryptShareStorage = 5;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\EncryptShareNotaryStorage $var
     * @return $this
     */
    public function setEncryptShareStorage($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\EncryptShareNotaryStorage::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.EncryptNotaryAdd encryptAdd = 6;</code>
     * @return \Jason\Chain33\Kernel\Protobuf\EncryptNotaryAdd|null
     */
    public function getEncryptAdd()
    {
        return $this->readOneof(6);
    }

    public function hasEncryptAdd()
    {
        return $this->hasOneof(6);
    }

    /**
     * Generated from protobuf field <code>.Jason.Chain33.Kernel.Protobuf.EncryptNotaryAdd encryptAdd = 6;</code>
     * @param \Jason\Chain33\Kernel\Protobuf\EncryptNotaryAdd $var
     * @return $this
     */
    public function setEncryptAdd($var)
    {
        GPBUtil::checkMessage($var, \Jason\Chain33\Kernel\Protobuf\EncryptNotaryAdd::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 ty = 7;</code>
     * @return int
     */
    public function getTy()
    {
        return $this->ty;
    }

    /**
     * Generated from protobuf field <code>int32 ty = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setTy($var)
    {
        GPBUtil::checkInt32($var);
        $this->ty = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->whichOneof("value");
    }

}

