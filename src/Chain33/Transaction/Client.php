<?php

namespace Jason\Chain33\Transaction;

use Jason\Chain33\Kernel\BaseClient;

/**
 * Class Client
 * @package Jason\Chain33\Transaction
 */
class Client extends BaseClient
{

    /**
     * Notes: 转账（三合一）
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 21:34
     * @param string $to
     * @param int    $amount
     * @param int    $fee
     * @param string $privkey
     * @return string
     */
    public function transfer(string $to, int $amount, int $fee, string $privkey): string
    {
        $txHex = $this->createRaw($to, $amount, $fee, 'coins', '', false);

        $data = $this->sign($privkey, $txHex, $fee);

        return $this->send($data);
    }

    /**
     * Notes: 根据哈希查询交易信息
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 21:34
     * @param $hash 交易哈希
     * @return array
     */
    public function query($hash): array
    {
        return $this->client->QueryTransaction([
            'hash' => $hash,
        ]);
    }

    /**
     * Notes: 构造交易
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 20:37
     * @param string $to          发送到地址
     * @param int    $amount      发送金额，注意基础货币单位为10^8
     * @param int    $fee         手续费，注意基础货币单位为10^8
     * @param string $execer      执行器名称，如果是普通转账，此处应填coins，如果是构造平行链的基础代币，此处要填写user.p.xxx.coins
     * @param string $tokenSymbol token 的 symbol （非token转账这个不用填）
     * @param bool   $isToken     是否是token类型的转账 （非token转账这个不用填 包括平行链的基础代币转账也不用填）
     * @param bool   $isWithdraw  是否为取款交易
     * @param string $execName    TransferToExec（转到合约） 或 Withdraw（从合约中提款），如果要构造平行链上的转账或普通转账，此参数置空
     * @param string $note        备注
     * @return string 交易对象的十六进制字符串编码
     */
    public function createRaw(string $to, int $amount, int $fee = 0, string $execer = 'coins', string $tokenSymbol = '', bool $isToken = true, bool $isWithdraw = false, string $execName = '', string $note = ''): string
    {
        return $this->client->CreateRawTransaction([
            'to'          => $to,
            'amount'      => $amount,
            'fee'         => $fee,
            'note'        => $note,
            'isToken'     => $isToken,
            'isWithdraw'  => $isWithdraw,
            'tokenSymbol' => $tokenSymbol,
            'execName'    => $execName,
            'execer'      => $execer,
        ]);
    }

    /**
     * Notes: 交易签名
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 21:28
     * @param string $privkey 签名私钥
     * @param string $txHex   原始交易数据
     * @param int    $fee     费用
     * @param string $expire  过期时间
     * @return string 交易签名后的十六进制字符串
     */
    public function sign(string $privkey, string $txHex, string $expire = '300s'): string
    {
        return $this->client->SignRawTx([
            'addr'      => '',
            'privkey'   => $privkey,
            'txHex'     => $txHex,
            'expire'    => $expire,
            'index'     => 0,
            'token'     => '',
            'fee'       => 0,
            'newToAddr' => '',
        ]);
    }

    /**
     * Notes: 发送交易
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 21:33
     * @param $data 签名后的交易数据
     * @return string 交易发送后，生成的交易哈希（后面可以使用此哈希查询交易状态和历史）
     */
    public function send($data): string
    {
        return $this->client->SendTransaction([
            'data'  => $data,
            'token' => '',
        ]);
    }

    /**
     * Notes: 根据地址获取交易信息
     * @Author: <C.Jason>
     * @Date  : 2020/5/14 2:48 下午
     * @param string $addr  要查询的账户地址
     * @param int    $count 返回的数据条数
     * @param int    $flag  查询的方向；0：正向查询，区块高度从低到高；-1：反向查询；
     * @param int    $direction
     * @param int    $height
     * @param int    $index
     * @return mixed
     */
    public function getTx(string $addr, int $count, int $flag = 0, int $direction = 0, int $height = -1, int $index = 0)
    {
        return $this->client->GetTxByAddr([
            'addr'      => $addr,
            'flag'      => $flag,
            'count'     => $count,
            'direction' => $direction,
            'height'    => $height,
            'index'     => $index,
        ]);
    }

    /**
     * Notes: 获取地址相关摘要信息
     * @Author: <C.Jason>
     * @Date  : 2020/5/14 2:57 下午
     * @param $addr 要查询的地址信息
     * @return mixed
     */
    public function overview($addr)
    {
        return $this->client->GetAddrOverview([
            'addr' => $addr,
        ]);
    }

}
