<?php

namespace Jason\Chain33\Token;

use Jason\Chain33\Kernel\BaseClient;

/**
 * Class Client
 * @package Jason\Chain33\Token
 */
class Client extends BaseClient
{

    /**
     * Notes: 发行TOKEN
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 22:09
     */
    public function publish(string $symbol, int $total, string $owner)
    {
        $txHex = $this->client->CreateRawTokenPreCreateTx([
            'name'         => $symbol,
            'symbol'       => $symbol,
            'introduction' => $symbol,
            'total'        => $total,
            'price'        => 0,
            'category'     => 1,
            'owner'        => $owner,
        ], 'token');

        $data = $this->app->transaction->sign('65622cbb675a62ec6de652811dc649286652b75c80850ccd7bb30ffb053c5af9', $txHex);

        return $this->app->transaction->send($data);
    }

    /**
     * Notes: 完成发行TOKEN
     * @Author: <C.Jason>
     * @Date  : 2020/5/14 6:17 下午
     * @param string $symbol
     * @param string $owner
     * @return mixed
     */
    public function finish(string $symbol, string $owner)
    {
        $txHex = $this->client->CreateRawTokenFinishTx([
            'symbol' => strtoupper($symbol),
            'owner'  => $owner,
        ], 'token');
        $data  = $this->app->transaction->sign('65622cbb675a62ec6de652811dc649286652b75c80850ccd7bb30ffb053c5af9', $txHex);

        return $this->app->transaction->send($data);
    }

    /**
     * Notes: 查询所有预创建的token | 查询所有创建成功的token
     * @Author: <C.Jason>
     * @Date  : 2020/5/14 6:18 下午
     * @param int $status 0预创建 1创建成功
     * @return mixed
     */
    public function get($status = 0)
    {
        return $this->client->Query([
            'execer'   => 'token',
            'funcName' => 'GetTokens',
            'payload'  => [
                'status'     => $status,
                'queryAll'   => true,
                'symbolOnly' => true,
            ],
        ]);
    }

    /**
     * Notes: 查询指定创建成功的token
     * @Author: <C.Jason>
     * @Date  : 2020/5/14 6:19 下午
     * @param $symbol token的Symbol
     * @return mixed
     */
    public function info($symbol)
    {
        return $this->client->Query([
            'execer'   => 'token',
            'funcName' => 'GetTokenInfo',
            'payload'  => [
                'data' => $symbol,
            ],
        ]);
    }

}
