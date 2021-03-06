<?php

namespace Jason\Chain33\Token;

use Jason\Chain33\Kernel\BaseClient;
use Jason\Chain33\Kernel\Consts;

/**
 * Class Client
 * @package Jason\Chain33\Token
 */
class Client extends BaseClient
{

    /**
     * Notes: 发行TOKEN
     * @Author: <C.Jason>
     * @Date  : 2020/5/25 3:59 下午
     * @param string $name         token 名称
     * @param string $symbol       token标记符，最大长度是16个字符，且必须为大写字符和数字
     * @param string $introduction token 简介
     * @param int    $total        发行总量
     * @param string $owner        token拥有者地址
     * @param int    $category     token属性类别， 0 为普通token， 1 可增发和燃烧
     * @return mixed
     */
    public function publish(string $name, string $symbol, string $introduction, int $total, string $owner, int $category = Consts::TOKEN_MINT_BURN)
    {
        $txHex = $this->client->CreateRawTokenPreCreateTx([
            'name'         => $name,
            'symbol'       => $symbol,
            'introduction' => $introduction,
            'total'        => $total,
            'price'        => 0,
            'category'     => $category,
            'owner'        => $owner,
        ], 'token');

        $data = $this->app->transaction->sign($this->config['superManager']['privateKey'], $txHex);

        return $this->app->transaction->send($data);
    }

    /**
     * Notes: 完成发行TOKEN
     * @Author: <C.Jason>
     * @Date  : 2020/5/14 6:17 下午
     * @param string $symbol token标记符，最大长度是16个字符，且必须为大写字符和数字
     * @param string $owner  token拥有者地址
     * @return mixed
     */
    public function finish(string $symbol, string $owner)
    {
        $txHex = $this->client->CreateRawTokenFinishTx([
            'symbol' => strtoupper($symbol),
            'owner'  => $owner,
        ], 'token');

        $data = $this->app->transaction->sign($this->config['superManager']['privateKey'], $txHex);

        return $this->app->transaction->send($data);
    }

    /**
     * Notes: 查询所有预创建的token | 查询所有创建成功的token
     * @Author: <C.Jason>
     * @Date  : 2020/5/14 6:18 下午
     * @param int $status 0预创建 1创建成功
     * @return mixed
     */
    public function get($status = Consts::TOKEN_PREPARED)
    {
        return $this->client->Query([
            'execer'   => 'token',
            'funcName' => 'GetTokens',
            'payload'  => [
                'status'     => $status,
                'queryAll'   => true,
                'symbolOnly' => false,
            ],
        ])['tokens'];
    }

    /**
     * Notes: 查询指定创建成功的token
     * @Author: <C.Jason>
     * @Date  : 2020/5/14 6:19 下午
     * @param string $symbol token的Symbol
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

    /**
     * Notes: 生成撤销创建token的交易，只能撤销未完成的（un finish）
     * @Author: <C.Jason>
     * @Date  : 2020/5/20 3:24 下午
     * @param string $symbol token的Symbol
     * @param string $owner  拥有者地址
     * @return mixed
     */
    public function revoke(string $symbol, string $owner)
    {
        $txHex = $this->client->CreateRawTokenRevokeTx([
            'symbol' => $symbol,
            'owner'  => $owner,
        ], 'token');

        $data = $this->app->transaction->sign($this->config['superManager']['privateKey'], $txHex);

        return $this->app->transaction->send($data);
    }

    /**
     * Notes: 查询地址下的token合约下的token资产
     * @Author: <C.Jason>
     * @Date  : 2020/5/20 3:34 下午
     * @param string $address 要查询的地址
     * @return mixed
     */
    public function assets($address): array
    {
        return $this->client->Query([
            'execer'   => 'token',
            'funcName' => 'GetAccountTokenAssets',
            'payload'  => [
                'address' => $address,
                'execer'  => 'token',
            ],
        ])['tokenAssets'];
    }

    /**
     * Notes: 查询token相关的交易
     * @Author: <C.Jason>
     * @Date  : 2020/5/25 11:07 上午
     * @param string $symbol    token标记符
     * @param string $addr      地址
     * @param int    $count     count: 交易的数量
     * @param int    $flag      分页相关参数
     * @param int    $direction 分页相关参数
     * @param int    $height    分页相关参数
     * @param int    $index     分页相关参数
     * @return mixed
     */
    public function tx(string $symbol, string $addr, int $count, int $flag = 0, int $direction = 0, int $height = -1, int $index = 0)
    {
        return $this->client->Query([
            'execer'   => 'token',
            'funcName' => 'GetTxByToken',
            'payload'  => [
                'symbol'    => $symbol,
                'addr'      => $addr,
                'count'     => $count,
                'flag'      => $flag,
                'height'    => $height,
                'index'     => $index,
                'direction' => $direction,
            ],
        ])['txInfos'];
    }

    /**
     * Notes: token的增发
     * @Author: <C.Jason>
     * @Date  : 2020/5/20 3:44 下午
     * @param string $symbol     token的标记符
     * @param int    $amount     增发token的数量
     * @param string $privateKey 拥有者的私钥
     * @return mixed
     */
    public function mint(string $symbol, int $amount, string $privateKey)
    {
        $txHex = $this->client->CreateRawTokenMintTx([
            'symbol' => $symbol,
            'amount' => $amount,
        ], 'token');

        $data = $this->app->transaction->sign($privateKey, $txHex);

        return $this->app->transaction->send($data);
    }

    /**
     * Notes: token的燃烧
     * @Author: <C.Jason>
     * @Date  : 2020/5/20 3:44 下午
     * @param string $symbol     token的标记符
     * @param int    $amount     燃烧token的数量
     * @param string $privateKey 拥有者的私钥
     * @return mixed
     */
    public function burn(string $symbol, int $amount, string $privateKey)
    {
        $txHex = $this->client->CreateRawTokenBurnTx([
            'symbol' => $symbol,
            'amount' => $amount,
        ], 'token');

        $data = $this->app->transaction->sign($privateKey, $txHex);

        return $this->app->transaction->send($data);
    }

    /**
     * Notes: 查询token的变化记录
     * @Author: <C.Jason>
     * @Date  : 2020/5/20 3:47 下午
     * @param string $symbol token标记符
     * @return mixed actionType: 8 是token创建， 12 是增发， 13 是燃烧
     */
    public function history(string $symbol)
    {
        return $this->client->Query([
            'execer'   => 'token',
            'funcName' => 'GetTokenHistory',
            'payload'  => [
                'data' => $symbol,
            ],
        ]);
    }

}
