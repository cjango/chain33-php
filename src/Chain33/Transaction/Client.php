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
     * @param  string  $to       发送到地址
     * @param  int     $amount   转账金额
     * @param  int     $fee      手续费
     * @param  string  $privkey  私钥
     * @param  string  $exectr   执行器
     * @param  string  $symbol   代币
     * @param  string  $node     备注
     * @return string
     */
    public function transfer(
        string $to,
        int $amount,
        int $fee,
        string $privkey,
        string $exectr = '',
        string $symbol = '',
        string $node = ''
    ): string {
        $isToken = !empty($symbol);

        $txHex = $this->createRaw($to, $amount, $fee, $exectr, $symbol, $isToken, false, '', $node);

        $data = $this->sign($privkey, $txHex);

        return $this->send($data);
    }

    /**
     * Notes: 根据哈希查询交易信息
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 21:34
     * @param  string  $hash  交易哈希
     * @return array
     */
    public function query(string $hash): array
    {
        return $this->client->QueryTransaction([
            'hash' => $hash,
        ]);
    }

    /**
     * Notes: 构造交易
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 20:37
     * @param  string  $to           发送到地址
     * @param  int     $amount       发送金额，注意基础货币单位为10^8
     * @param  int     $fee          手续费，注意基础货币单位为10^8
     * @param  string  $execer       执行器名称，如果是普通转账，此处应填coins，如果是构造平行链的基础代币，此处要填写user.p.xxx.coins
     * @param  string  $tokenSymbol  token 的 symbol （非token转账这个不用填）
     * @param  bool    $isToken      是否是token类型的转账 （非token转账这个不用填 包括平行链的基础代币转账也不用填）
     * @param  bool    $isWithdraw   是否为取款交易
     * @param  string  $execName     TransferToExec（转到合约） 或 Withdraw（从合约中提款），如果要构造平行链上的转账或普通转账，此参数置空
     * @param  string  $note         备注
     * @return string 交易对象的十六进制字符串编码
     */
    public function createRaw(
        string $to,
        int $amount,
        int $fee = 0,
        string $execer = 'coins',
        string $tokenSymbol = '',
        bool $isToken = true,
        bool $isWithdraw = false,
        string $execName = '',
        string $note = ''
    ): string {
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
     * Notes   : 构造并发送不收手续费交易 CreateNoBalanceTransaction（平行链）
     *           构造交易 -> 平行链交易包装 -> 交易签名 -> 发送交易
     *           后面的交易签名步骤里需要注意一点，参数index需填2
     * @Date   : 2021/1/26 4:22 下午
     * @Author : < Jason.C >
     * @param  string  $txHex    未签名的原始交易数据
     * @param  string  $payAddr  用于付费的地址，这个地址要在主链上存在，并且里面有比特元用于支付手续费，使用payAddr则依赖钱包中存储的私钥签名
     * @return string            未签名的原始交易数据
     */
    public function paraTransaction(string $txHex, string $payAddr)
    {
        return $this->client->CreateNoBalanceTransaction([
            'txHex'   => $txHex,
            'payAddr' => $payAddr,
        ]);
    }

    /**
     * Notes   : 构造多笔并发送不收手续费交易（平行链）
     * @Date   : 2021/1/26 4:32 下午
     * @Author : < Jason.C >
     * @param  array   $txHexs   未签名的原始交易数据
     * @param  string  $payAddr  用于付费的地址，这个地址要在主链上存在，并且里面有比特元用于支付手续费，使用payAddr则依赖钱包中存储的私钥签名
     * @return string            未签名的原始交易数据
     */
    public function paraTransactions(array $txHexs, string $payAddr)
    {
        return $this->client->CreateNoBlanaceTxs([
            'txHexs'  => $txHexs,
            'payAddr' => $payAddr,
        ]);
    }

    /**
     * Notes  : 交易签名
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 21:28
     * @param  string  $privkey  签名私钥
     * @param  string  $txHex    原始交易数据
     * @param  int     $fee      费用
     * @param  string  $expire   过期时间
     * @param  int     $index    若是签名交易组，则为要签名的交易序号，从1开始，小于等于0则为签名组内全部交易
     * @return string 交易签名后的十六进制字符串
     */
    public function sign(string $privkey, string $txHex, string $expire = '300s', int $fee = 0, int $index = 0): string
    {
        return $this->client->SignRawTx([
            'addr'      => '',
            'privkey'   => $privkey,
            'txHex'     => $txHex,
            'expire'    => $expire,
            'index'     => $index,
            'token'     => '',
            'fee'       => $fee,
            'newToAddr' => '',
        ]);
    }

    /**
     * Notes: 发送交易
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 21:33
     * @param  string  $data  签名后的交易数据
     * @return string 交易发送后，生成的交易哈希（后面可以使用此哈希查询交易状态和历史）
     */
    public function send(string $data): string
    {
        return $this->client->SendTransaction([
            'data'  => $data,
            'token' => '',
        ]);
    }

    /**
     * Notes   : 重写交易，这个好像没啥用，不写了
     * @Date   : 2021/1/26 4:38 下午
     * @Author : < Jason.C >
     */
    public function rewriteRaw()
    {
    }

    /**
     * Notes: 根据地址获取交易信息
     * @Author: <C.Jason>
     * @Date  : 2020/5/14 2:48 下午
     * @param  string  $addr       要查询的账户地址
     * @param  int     $count      返回的数据条数
     * @param  int     $flag       交易类型；0：所有涉及到addr的交易； 1：addr作为发送方； 2：addr作为接收方；
     * @param  int     $direction  查询的方向；0：正向查询，区块高度从低到高；-1：反向查询；
     * @param  int     $height     交易所在的block高度，-1：表示从最新的开始向后取；大于等于0的值，从具体的高度+具体index开始取
     * @param  int     $index      交易所在block中的索引，取值0—100000
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
     * @param  string  $addr  要查询的地址信息
     * @return mixed
     */
    public function overview(string $addr)
    {
        return $this->client->GetAddrOverview([
            'addr' => $addr,
        ]);
    }

    /**
     * Notes   : 根据哈希数组批量获取交易信息
     * @Date   : 2021/1/26 4:48 下午
     * @Author : < Jason.C >
     * @param  array  $hashes         交易组
     * @param  bool   $disableDetail  是否隐藏交易详情
     * @return array                  交易详情信息
     */
    public function getTxByHashes(array $hashes, bool $disableDetail = false)
    {
        return $this->client->GetTxByHashes([
            'hashes'        => $hashes,
            'disableDetail' => $disableDetail,
        ])['txs'];
    }

    /**
     * Notes   : 根据哈希获取交易的字符串
     * @Date   : 2021/1/26 4:51 下午
     * @Author : < Jason.C >
     * @param  string  $hash  交易哈希
     * @return string         交易对象的十六进制编码数据
     */
    public function getHexTxByHash(string $hash)
    {
        return $this->client->GetHexTxByHash([
            'hash' => $hash,
        ]);
    }

    /**
     * Notes   : 将合约名转成实际地址
     * @Date   : 2021/1/26 4:54 下午
     * @Author : < Jason.C >
     * @param  string  $execname  执行器名称，如果需要往执行器中转币这样的操作，需要调用些接口将执行器名转成实际地址
     * @return mixed
     */
    public function convertExectoAddr(string $execname)
    {
        return $this->client->ConvertExectoAddr([
            'execname' => $execname,
        ]);
    }

    /**
     * Notes   : 构造交易组
     * @Date   : 2021/1/26 4:58 下午
     * @Author : < Jason.C >
     * @param  array  $txs  十六进制格式交易数组
     * @return string
     */
    public function createRawTxGroup(array $txs)
    {
        return $this->client->CreateRawTxGroup([
            'txs' => $txs,
        ]);
    }

    /**
     * Notes   : 设置合适单元交易费率
     * @Date   : 2021/1/26 5:07 下午
     * @Author : < Jason.C >
     * @param  int  $txCount  预发送的交易个数,单个交易发送默认空即可
     * @param  int  $txSize   预发送交易的大小, 单位Byte, 字节
     * @return mixed
     */
    public function getProperFee(int $txCount, int $txSize)
    {
        return $this->client->CreateRawTxGroup([
            'txCount' => $txCount,
            '$txSize' => $txSize,
        ]);
    }

}
