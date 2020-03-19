<?php

namespace Jason\Chain33\Transaction;

use Jason\Chain33\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * Notes: 构造交易
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:41
     * @param $to 发送到地址
     * @param $amount 发送金额，注意基础货币单位为10^8
     * @param $fee 手续费，注意基础货币单位为10^8
     * @param $note 备注
     * @param $isToken 是否是token类型的转账 （非token转账这个不用填 包括平行链的基础代币转账也不用填）
     * @param $isWithdraw 是否为取款交易
     * @param $tokenSymbol token 的 symbol （非token转账这个不用填）
     * @param $execName TransferToExec（转到合约） 或 Withdraw（从合约中提款），如果要构造平行链上的转账或普通转账，此参数置空
     * @param $execer 执行器名称，如果是普通转账，此处应填coins，如果是构造平行链的基础代币，此处要填写user.p.xxx.coins
     * @return mixed 交易对象的十六进制字符串编码
     */
    public function CreateRawTransaction($to, $amount, $fee, $note, $isToken, $isWithdraw, $tokenSymbol, $execName)
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
        ]);
    }

    /**
     * Notes: 交易签名
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:44
     * @param $addr addr与privkey可以只输入其一，如果使用addr则依赖钱包中存储的私钥签名
     * @param $privkey addr与privkey可以只输入其一，如果使用privkey则直接签名
     * @param $txHex 上一步生成的原始交易数据
     * @param $expire 过期时间可输入如”300s”，”-1.5h”或者”2h45m”的字符串，有效时间单位为”ns”, “us” (or “µs”), “ms”, “s”, “m”, “h”
     * @param $index 若是签名交易组，则为要签名的交易序号，从1开始，小于等于0则为签名组内全部交易
     * @param $token
     * @param $fee 费用
     * @param $newToAddr
     * @return mixed 交易签名后的十六进制字符串
     */
    public function SignRawTx($addr, $privkey, $txHex, $expire, $index, $token, $fee, $newToAddr)
    {
        return $this->client->SignRawTx([
            'addr'      => $addr,
            'privkey'   => $privkey,
            'txHex'     => $txHex,
            'expire'    => $expire,
            'index'     => $index,
            'token'     => $token,
            'fee'       => $fee,
            'newToAddr' => $newToAddr,
        ]);
    }

    /**
     * Notes: 发送交易
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:46
     * @param $data 为上一步签名后的交易数据
     * @param $token 可为空
     * @return mixed 交易发送后，生成的交易哈希（后面可以使用此哈希查询交易状态和历史）
     */
    public function SendTransaction($data, $token)
    {
        return $this->client->SendTransaction([
            'data'  => $data,
            'token' => $token,
        ]);
    }

    /**
     * Notes: 构造并发送不收手续费交易（平行链）
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:47
     * @param $txHex 未签名的原始交易数据
     * @param $payAddr 用于付费的地址，这个地址要在主链上存在，并且里面有比特元用于支付手续费, payAddr与privkey可以只输入其一，如果使用payAddr则依赖钱包中存储的私钥签名
     * @param $privkey 对应于payAddr的私钥。如果payAddr已经导入到平行链，可以只传地址
     * @param $expire 过期时间可输入如”300s”，”-1.5h”或者”2h45m”的字符串，有效时间单位为”ns”, “us” (or “µs”), “ms”, “s”, “m”, “h”， 不传递默认设置永不过期
     * @return mixed
     */
    public function CreateNoBalanceTransaction($txHex, $payAddr, $privkey, $expire)
    {
        return $this->client->CreateNoBalanceTransaction([
            'txHex'   => $txHex,
            'payAddr' => $payAddr,
            'privkey' => $privkey,
            'expire'  => $expire,
        ]);
    }

    /**
     * Notes: 构造多笔并发送不收手续费交易（平行链）
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:47
     * @param $txHex 未签名的原始交易数据
     * @param $payAddr 用于付费的地址，这个地址要在主链上存在，并且里面有比特元用于支付手续费, payAddr与privkey可以只输入其一，如果使用payAddr则依赖钱包中存储的私钥签名
     * @param $privkey 对应于payAddr的私钥。如果payAddr已经导入到平行链，可以只传地址
     * @param $expire 过期时间可输入如”300s”，”-1.5h”或者”2h45m”的字符串，有效时间单位为”ns”, “us” (or “µs”), “ms”, “s”, “m”, “h”， 不传递默认设置永不过期
     * @return mixed
     */
    public function CreateNoBlanaceTxs($txHex, $payAddr, $privkey, $expire)
    {
        return $this->client->CreateNoBlanaceTxs([
            'txHex'   => $txHex,
            'payAddr' => $payAddr,
            'privkey' => $privkey,
            'expire'  => $expire,
        ]);
    }

    /**
     * Notes: 重写交易
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:50
     * @param $to 重写交易的目的地址，只有单笔交易生效，交易组不生效
     * @param $fee 重写交易的费用，交易组只会修改第一笔交易的费用
     * @param $tx 需要重写的原始交易数据
     * @param $expire 过期时间可输入如”300ms”，”-1.5h”或者”2h45m”的字符串，有效时间单位为”ns”, “us” (or “µs”), “ms”, “s”, “m”, “h”
     * @param $index 若是交易组，则为要重写的交易序号，从1开始，小于等于0则为交易组内全部交易
     * @return mixed 重写之后交易的十六进制字符串
     */
    public function ReWriteRawTx($to, $fee, $tx, $expire, $index)
    {
        return $this->client->ReWriteRawTx([
            'to'     => $to,
            'fee'    => $fee,
            'tx'     => $tx,
            'expire' => $expire,
            'index'  => $index,
        ]);
    }

    /**
     * Notes: 根据哈希查询交易信息
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:52
     * @param $hash
     * @return mixed
     */
    public function QueryTransaction($hash)
    {
        return $this->client->QueryTransaction([
            'hash' => $hash,
        ]);
    }

    /**
     * Notes: 根据地址获取交易信息
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:53
     * @param $addr 要查询的账户地址
     * @param $flag 交易类型；0：所有涉及到addr的交易； 1：addr作为发送方； 2：addr作为接收方；
     * @param $count 返回的数据条数
     * @param $direction 查询的方向；0：正向查询，区块高度从低到高；-1：反向查询；
     * @param $height 交易所在的block高度，-1：表示从最新的开始向后取；大于等于0的值，从具体的高度+具体index开始取
     * @param $index 交易所在block中的索引，取值0—100000
     * @return mixed
     */
    public function GetTxByAddr($addr, $flag, $count, $direction, $height, $index)
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
     * Notes: 根据哈希数组批量获取交易信息
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:54
     * @param $hashes 交易ID列表，用逗号“,”分割
     * @param $disableDetail 是否隐藏交易详情，默认为false
     * @return mixed
     */
    public function GetTxByHashes($hashes, $disableDetail = false)
    {
        return $this->client->GetTxByAddr([
            'hashes'        => $hashes,
            'disableDetail' => $disableDetail,
        ]);
    }

    /**
     * Notes: 根据哈希获取交易的字符串
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:56
     * @param $hash
     * @return mixed
     */
    public function GetHexTxByHash($hash)
    {
        return $this->client->GetHexTxByHash([
            'hash' => $hash,
        ]);
    }

    /**
     * Notes:
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:57
     * @param $addr 要查询的账户地址
     * @param $flag 交易类型；0：所有涉及到addr的交易； 1：addr作为发送方； 2：addr作为接收方；
     * @param $count 返回的数据条数
     * @param $direction 查询的方向；0：正向查询，区块高度从低到高；-1：反向查询；
     * @param $height 交易所在的block高度，-1：表示从最新的开始向后取；大于等于0的值，从具体的高度+具体index开始取
     * @param $index 交易所在block中的索引，取值0—100000
     * @return mixed
     */
    public function GetAddrOverview($addr, $flag, $count, $direction, $height, $index)
    {
        return $this->client->GetAddrOverview([
            'addr'      => $addr,
            'flag'      => $flag,
            'count'     => $count,
            'direction' => $direction,
            'height'    => $height,
            'index'     => $index,
        ]);
    }

    /**
     * Notes: 将合约名转成实际地址
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:59
     * @param $execname 执行器名称，如果需要往执行器中转币这样的操作，需要调用些接口将执行器名转成实际地址
     * @return mixed
     */
    public function ConvertExectoAddr($execname)
    {
        return $this->client->ConvertExectoAddr([
            'execname' => $execname,
        ]);
    }

    /**
     * Notes: 构造交易组
     * @Author: <C.Jason>
     * @Date: 2020/3/19 16:00
     * @param $txs 十六进制格式交易数组
     * @return mixed
     */
    public function CreateRawTxGroup($txs)
    {
        return $this->client->CreateRawTxGroup([
            'txs' => $txs,
        ]);
    }

    /**
     * Notes: 设置合适单元交易费率
     * @Author: <C.Jason>
     * @Date: 2020/3/19 16:01
     * @param $txCount 预发送的交易个数,单个交易发送默认空即可
     * @param $txSize 预发送交易的大小, 单位Byte, 字节
     * @return mixed
     */
    public function GetProperFee($txCount, $txSize)
    {
        return $this->client->GetProperFee([
            'txCount' => $txCount,
            'txSize'  => $txSize,
        ]);
    }

}
