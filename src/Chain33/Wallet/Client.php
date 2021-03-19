<?php

namespace Jason\Chain33\Wallet;

use Jason\Chain33\Kernel\BaseClient;

/**
 * Class Client
 * @package Jason\Chain33\BaseClient
 */
class Client extends BaseClient
{

    /**
     * Notes: 创建一个钱包
     * @Author: <C.Jason>
     * @Date  : 2020/4/30 17:33
     * @param  string  $password  钱包密码
     * @return bool
     */
    public function create(string $password): bool
    {
        $seed = $this->client->GenSeed([
            'lang' => 0,
        ]);

        return $this->client->SaveSeed([
            'seed'   => $seed['seed'],
            'passwd' => $password,
        ])['isOK'];
    }

    /**
     * Notes: 获取钱包助记词
     * @Author: <C.Jason>
     * @Date  : 2020/4/30 17:34
     * @return string
     */
    public function getSeed(): string
    {
        $this->unlock(false);

        return $this->client->GetSeed([
            'passwd' => $this->config['password'],
        ])['seed'];
    }

    /**
     * Notes: 修改密码
     * @Author: <C.Jason>
     * @Date  : 2020/4/30 17:36
     * @param  string  $old  旧密码
     * @param  string  $new  新密码
     * @return bool
     */
    public function password(string $old, string $new): bool
    {
        return $this->client->SetPasswd([
            'oldPass' => $old,
            'newPass' => $new,
        ])['isOK'];
    }

    /**
     * Notes: 钱包状态
     * @Author: <C.Jason>
     * @Date  : 2020/3/18 21:38
     * @return array
     */
    public function status(): array
    {
        return $this->client->GetWalletStatus();
    }

    /**
     * Notes: 设置交易费用
     * @Author: <C.Jason>
     * @Date  : 2020/3/18 21:38
     * @param  int  $amount
     * @return bool
     */
    public function setFee(int $amount): bool
    {
        $this->unlock(false);

        return $this->client->SetTxFee([
            'amount' => $amount,
        ])['isOK'];
    }

    /**
     * Notes: 发送交易
     * @Author: <C.Jason>
     * @Date  : 2020/4/30 17:41
     * @param  string  $from    来源地址
     * @param  string  $to      发送到地址
     * @param  int     $amount  发送金额
     * @param  string  $note    备注
     * @param  string  $symbol  toekn的symbol（非token转账这个不用填）
     * @return string
     */
    public function send(string $from, string $to, int $amount, string $note = '', string $symbol = ''): string
    {
        $this->unlock(false);

        $isToken = empty($symbol) ? false : true;

        return $this->client->SendToAddress([
            'from'        => $from,
            'to'          => $to,
            'amount'      => $amount,
            'note'        => $note,
            'isToken'     => $isToken,
            'tokenSymbol' => $symbol,
        ])['hash'];
    }

    /**
     * Notes: 获取钱包交易列表
     * @Author: <C.Jason>
     * @Date  : 2020/4/30 17:44
     * @param  string  $fromTx     Sprintf(“%018d”, height*100000 + index)，表示从高度 height 中的 index
     *                             开始获取交易列表；第一次传参为空，获取最新的交易
     * @param  int     $count      获取交易列表的个数
     * @param  int     $mode       获取交易列表的个数
     * @param  int     $direction  查找方式；0，获取最新的交易数据，倒叙排序，在交易列表中时间高度是递减的；1，正序排序，按照时间，区块高度增加的方向获取交易列表
     * @return array
     */
    public function txList(string $fromTx, int $count, int $mode, int $direction = 0): array
    {
        return $this->client->WalletTxList([
            'fromTx'    => $fromTx,
            'count'     => $count,
            'direction' => $direction,
            'mode'      => $mode,
        ])['txDetails'];
    }

    /**
     * Notes: 合并账户余额
     * @Author: <C.Jason>
     * @Date  : 2020/5/14 1:31 下午
     * @param  string  $to  合并钱包上的所有余额到一个账户地址
     * @return mixed
     */
    public function merge(string $to)
    {
        return $this->client->MergeBalance([
            'to' => $to,
        ]);
    }

}
