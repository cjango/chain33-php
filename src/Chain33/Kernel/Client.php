<?php

namespace Jason\Chain33\Kernel;

use Exception;
use GuzzleHttp\Client as Guzzle;
use Jason\Chain33\Kernel\Support\RpcRequest;
use RuntimeException;

class Client
{

    protected $app;

    protected $config;

    protected $client;

    public function __construct($app)
    {
        $this->app    = $app;
        $this->config = $app->config;

        $this->client = new Guzzle([
            'base_uri' => $this->config['base_uri'] . ':' . $this->config['base_port'],
        ]);
    }

    public function __call($method, $args)
    {
        return $this->request($method, ...$args);
    }

    public function request(string $method, array $params = [], $prefix = null)
    {
        $rpcRequest = new RpcRequest();

        if ($prefix) {
            $rpcRequest->setPrefix($prefix);
        }

        $rpcRequest->setMethod($method);

        if (!empty($params)) {
            $rpcRequest->setParams($params);
        }

        return $this->post($rpcRequest);
    }

    public function post(RpcRequest $body)
    {
        try {
            $response = $this->client->post('', ['body' => (string)$body]);

            $resJson = json_decode($response->getBody()->getContents(), true);

            if ($body->getId() != $resJson['id']) {
                throw new RuntimeException("No the same id");
            }

            if ($resJson['error']) {
                throw new RuntimeException($resJson['error'] . '|' . $body->toJson());
            }

            return $resJson['result'];
        } catch (Exception $exception) {
            throw new RuntimeException($exception->getMessage());
        }
    }

}
