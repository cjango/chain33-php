<?php

namespace Jason\Chain33\Kernel\Support;

class RpcRequest
{

    protected $jsonrpc = '2.0';

    protected $id;

    protected $method;

    protected $params = [];

    protected $prefix = 'Chain33';

    public function __construct(int $id = null, string $method = null, array $params = [])
    {
        $this->id     = $id ?: time();
        $this->method = $method;
        $this->params = $params;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;
    }

    public function setMethod(string $method)
    {
        $this->method = $this->prefix . '.' . $method;

        return $this;
    }

    public function setParams($params = [])
    {
        array_push($this->params, $params);

        return $this;
    }

    public function toJson()
    {
        return $this->__toString();
    }

    public function __toString(): string
    {
        $data = [
            'jsonrpc' => $this->jsonrpc,
            'id'      => $this->id,
            'method'  => $this->method,
            'params'  => $this->params,
        ];
        return json_encode($data);
    }
}
