<?php

namespace Jason\Chain33\Token;

use Jason\Chain33\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * Notes: 发行 TOKEN
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:12
     * @param $name token的全名，最大长度是128个字符
     * @param $symbol token标记符，最大长度是16个字符，且必须为大写字符和数字
     * @param $introduction token介绍，最大长度为1024个字节
     * @param $total 发行总量,需要乘以10的8次方，比如要发行100个币，需要100*1e8
     * 发行该token愿意承担的费用
     * @param $category token属性类别， 0 为普通token， 1 可增发和燃烧
     * @param $owner token拥有者地址
     * @return mixed
     */
    public function create($name, $symbol, $introduction, $total, $category, $owner)
    {
        $preTx = $this->client->CreateRawTokenPreCreateTx([
            "name"         => $name,
            "symbol"       => $symbol,
            "introduction" => $introduction,
            "total"        => $total * pow(10, 8),
            "price"        => 0,
            "category"     => $category,
            "owner"        => $owner,
        ], 'token');

        return $this->client->CreateRawTokenFinishTx([
            'symbol' => $symbol,
            'owner'  => $symbol,
        ], 'token');
    }

    /**
     * Notes: 查询所有TOKEN
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:18
     */
    public function get()
    {
        return $this->client->Query([
            'execer'   => 'token',
            'funcName' => 'GetTokens',
            'payload'  => [
                'status'     => 1,
                'queryAll'   => true,
                'symbolOnly' => true,
            ],
        ]);
    }

    /**
     * Notes: 查询指定创建成功的
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:23
     * @param $data
     * @return mixed
     */
    public function info($data)
    {
        return $this->client->Query([
            'execer'   => 'token',
            'funcName' => 'GetTokenInfo',
            'payload'  => [
                'data' => $data,
            ],
        ]);
    }

    /**
     * Notes: token转账
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:27
     * @param $from 来源地址
     * @param $to 发送到地址
     * @param $amount 发送金额
     * @param $note 备注
     * @param $isToken 发送的是否是token，false 的情况下发送的bty
     * @param $tokenSymbol token标记符，最大长度是16个字符，且必须为大写字符
     * @return mixed
     */
    public function send($from, $to, $amount, $note, $isToken, $tokenSymbol)
    {
        return $this->client->SendToAddress([
            'from'        => $from,
            'to'          => $to,
            'amount'      => $amount,
            'note'        => $note,
            'isToken'     => $isToken,
            'tokenSymbol' => $tokenSymbol,
        ]);
    }

    /**
     * Notes: token提币
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:27
     * @param $from token提币地址
     * @param $to token保存的合约地址
     * @param $amount 发送金额，填写负数
     * @param $note 备注
     * @param $isToken 发送的是否是token，false 的情况下发送的bty
     * @param $tokenSymbol token标记符，最大长度是16个字符，且必须为大写字符
     * @return mixed
     */
    public function withdraw($from, $to, $amount, $note, $isToken, $tokenSymbol)
    {
        return $this->client->SendToAddress([
            'from'        => $from,
            'to'          => $to,
            'amount'      => $amount,
            'note'        => $note,
            'isToken'     => $isToken,
            'tokenSymbol' => $tokenSymbol,
        ]);
    }

    /**
     * Notes: 查询地址下的token合约下的token资产
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:32
     * @return mixed
     */
    public function query($address)
    {
        return $this->client->Query([
            'execer'   => 'token',
            'funcName' => 'GetAccountTokenAssets',
            'payload'  => [
                'address' => $address,
                'execer'  => 'token',
            ],
        ]);
    }

    /**
     * Notes: 查询token相关的交易
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:34
     * @return mixed
     */
    public function GetTxByToken()
    {
        return $this->client->Query([
            'execer'   => 'token',
            'funcName' => 'GetTxByToken',
            'payload'  => [
                'symbol'    => $symbol,
                'count'     => $count,
                'flag'      => $flag,
                'height'    => $height,
                'index'     => $index,
                'direction' => $direction,
                'addr'      => $addr,
            ],
        ]);
    }

    /**
     * Notes: token的增发
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:37
     * @param $symbol token的标记符
     * @param $amount 增发token的数量, 需要 填写 数目* 1e8
     * @return mixed
     */
    public function mint($symbol, $amount)
    {
        return $this->client->CreateRawTokenMintTx([
            'symbol' => $symbol,
            'amount' => $amount * pow(10, 8),
        ], 'token');
    }

    /**
     * Notes: token的燃烧
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:37
     * @param $symbol
     * @param $amount
     */
    public function burn($symbol, $amount)
    {
        return $this->client->CreateRawTokenBurnTx([
            'symbol' => $symbol,
            'amount' => $amount * pow(10, 8),
        ], 'token');
    }

    /**
     * Notes: 查询token 的变化记录
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:41
     * @param $symbol token标记符
     * @return mixed
     */
    public function history($symbol)
    {
        return $this->client->Query([
            "execer"   => "token",
            "funcName" => "GetTokenHistory",
            "payload"  => [
                'data' => $symbol,
            ],
        ]);
    }

}
