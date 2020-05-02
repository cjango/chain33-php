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
     * @Date: 2020/5/2 22:09
     */
    public function publish(string $symbol, int $total, int $price, string $owner)
    {
        $txHex = $this->client->CreateRawTokenPreCreateTx([
            'name'         => $symbol,
            'symbol'       => $symbol,
            'introduction' => $symbol,
            'total'        => $total * 10000000,
            'price'        => $price * 10000000,
            'category'     => 1,
            'owner'        => $owner,
        ], 'token');

        $data = $this->app->transaction->sign('55637b77b193f2c60c6c3f95d8a5d3a98d15e2d42bf0aeae8e975fc54035e2f4', $txHex);

        return $this->app->transaction->send($data);
    }

    public function finish(string $symbol, string $owner)
    {
        $txHex = $this->client->CreateRawTokenPreCreateTx([
            'symbol' => $symbol,
            'owner'  => $owner,
        ], 'token');
        $data  = $this->app->transaction->sign('55637b77b193f2c60c6c3f95d8a5d3a98d15e2d42bf0aeae8e975fc54035e2f4', $txHex);

        return $this->app->transaction->send($data);
    }

}
