<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: storage.proto

namespace Jason\Chain33\Kernel\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * 内容存证模型
 *
 * Generated from protobuf message <code>Jason.Chain33.Kernel.Protobuf.ContentOnlyNotaryStorage</code>
 */
class ContentOnlyNotaryStorage extends \Google\Protobuf\Internal\Message
{
    /**
     *长度需要小于512k
     *
     * Generated from protobuf field <code>bytes content = 1;</code>
     */
    protected $content = '';
    /**
     *自定义的主键，可以为空，如果没传，则用txhash为key
     *
     * Generated from protobuf field <code>string key = 2;</code>
     */
    protected $key = '';
    /**
     * Op 0表示创建 1表示追加add
     *
     * Generated from protobuf field <code>int32 op = 3;</code>
     */
    protected $op = 0;
    /**
     *字符串值
     *
     * Generated from protobuf field <code>string value = 4;</code>
     */
    protected $value = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $content
     *          长度需要小于512k
     *     @type string $key
     *          自定义的主键，可以为空，如果没传，则用txhash为key
     *     @type int $op
     *           Op 0表示创建 1表示追加add
     *     @type string $value
     *          字符串值
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Storage::initOnce();
        parent::__construct($data);
    }

    /**
     *长度需要小于512k
     *
     * Generated from protobuf field <code>bytes content = 1;</code>
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     *长度需要小于512k
     *
     * Generated from protobuf field <code>bytes content = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setContent($var)
    {
        GPBUtil::checkString($var, False);
        $this->content = $var;

        return $this;
    }

    /**
     *自定义的主键，可以为空，如果没传，则用txhash为key
     *
     * Generated from protobuf field <code>string key = 2;</code>
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     *自定义的主键，可以为空，如果没传，则用txhash为key
     *
     * Generated from protobuf field <code>string key = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->key = $var;

        return $this;
    }

    /**
     * Op 0表示创建 1表示追加add
     *
     * Generated from protobuf field <code>int32 op = 3;</code>
     * @return int
     */
    public function getOp()
    {
        return $this->op;
    }

    /**
     * Op 0表示创建 1表示追加add
     *
     * Generated from protobuf field <code>int32 op = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setOp($var)
    {
        GPBUtil::checkInt32($var);
        $this->op = $var;

        return $this;
    }

    /**
     *字符串值
     *
     * Generated from protobuf field <code>string value = 4;</code>
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     *字符串值
     *
     * Generated from protobuf field <code>string value = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, True);
        $this->value = $var;

        return $this;
    }

}
