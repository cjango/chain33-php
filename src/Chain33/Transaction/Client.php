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
     * Notes:
     * @Author: <C.Jason>
     * @Date: 2020/5/2 21:34
     * @param string $to
     * @param int $amount
     * @param int $fee
     * @param string $privkey
     * @return string
     */
    public function transfer(string $to, int $amount, int $fee, string $privkey): string
    {
        $txHex = $this->createRaw($to, $amount, $fee);

        $data = $this->sign($privkey, $txHex, $fee);

        return $this->send($data);
    }

    /**
     * Notes: 根据哈希查询交易信息
     * @Author: <C.Jason>
     * @Date: 2020/5/2 21:34
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
     * @Date: 2020/5/2 20:37
     * @param string $to 发送到地址
     * @param int $amount 发送金额，注意基础货币单位为10^8
     * @param int $fee 手续费，注意基础货币单位为10^8
     * @param string $execer 执行器名称，如果是普通转账，此处应填coins，如果是构造平行链的基础代币，此处要填写user.p.xxx.coins
     * @param string $tokenSymbol token 的 symbol （非token转账这个不用填）
     * @param bool $isToken 是否是token类型的转账 （非token转账这个不用填 包括平行链的基础代币转账也不用填）
     * @param bool $isWithdraw 是否为取款交易
     * @param string $execName TransferToExec（转到合约） 或 Withdraw（从合约中提款），如果要构造平行链上的转账或普通转账，此参数置空
     * @param string $note 备注
     * @return string 交易对象的十六进制字符串编码
     */
    public function createRaw(string $to, int $amount, int $fee = 0, string $execer = 'token', string $tokenSymbol = '', bool $isToken = true, bool $isWithdraw = false, string $execName = '', string $note = ''): string
    {
        return $this->client->CreateRawTransaction([
            'to'          => $to,
            'amount'      => $amount * 100000000,
            'fee'         => $fee * 100000000,
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
     * @Date: 2020/5/2 21:28
     * @param string $privkey 签名私钥
     * @param string $txHex 原始交易数据
     * @param int $fee 费用
     * @param string $expire 过期时间
     * @return string 交易签名后的十六进制字符串
     */
    public function sign(string $privkey, string $txHex, int $fee = 0, string $expire = '60s'): string
    {
        return $this->client->SignRawTx([
            'addr'      => '',
            'privkey'   => $privkey,
            'txHex'     => $txHex,
            'expire'    => $expire,
            'index'     => 0,
            'token'     => '',
            'fee'       => $fee * 100000000,
            'newToAddr' => '',
        ]);
    }

    /**
     * Notes: 发送交易
     * @Author: <C.Jason>
     * @Date: 2020/5/2 21:33
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

}
