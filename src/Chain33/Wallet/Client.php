<?php

namespace Jason\Chain33\Wallet;

use Jason\Chain33\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * Notes: 创建一个钱包
     * @Author: <C.Jason>
     * @Date: 2020/4/30 17:33
     * @param string $password 钱包密码
     * @return bool
     */
    public function create(string $password): bool
    {
        $seed = $this->client->GenSeed([
            'lang' => 0,
        ]);

        return $this->client->SaveSeed([
            'seed'   => $seed->seed,
            'passwd' => $password,
        ])['isOK'];
    }

    /**
     * Notes: 获取钱包助记词
     * @Author: <C.Jason>
     * @Date: 2020/4/30 17:34
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
     * @Date: 2020/4/30 17:36
     * @param string $old 旧密码
     * @param string $new 新密码
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
     * @Date: 2020/3/18 21:38
     * @return array
     */
    public function status(): array
    {
        return $this->client->GetWalletStatus();
    }

    /**
     * Notes: 设置交易费用
     * @Author: <C.Jason>
     * @Date: 2020/3/18 21:38
     * @param int $amount
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
     * Notes:
     * @Author: <C.Jason>
     * @Date: 2020/4/30 17:41
     * @param string $from 来源地址
     * @param string $to 发送到地址
     * @param int $amount 发送金额
     * @param string $note 备注
     * @param bool $isToken 是否是token类型的转账（非token转账这个不用填）
     * @param string $tokenSymbol toekn的symbol（非token转账这个不用填）
     * @return string
     */
    public function send(string $from, string $to, int $amount, string $note, bool $isToken, string $tokenSymbol): string
    {
        $this->unlock(false);

        return $this->client->SendToAddress([
            'from'        => $from,
            'to'          => $to,
            'amount'      => $amount,
            'note'        => $note,
            'isToken'     => $isToken,
            'tokenSymbol' => $tokenSymbol,
        ])['hash'];
    }

    /**
     * Notes: 获取钱包交易列表
     * @Author: <C.Jason>
     * @Date: 2020/4/30 17:44
     * @param string $fromTx
     * @param int $count
     * @param int $direction
     * @param int $mode
     * @return array
     */
    public function txList(string $fromTx, int $count, int $direction, int $mode): array
    {
        return $this->client->WalletTxList([
            'fromTx'    => $fromTx,
            'count'     => $count,
            'direction' => $direction,
            'mode'      => $mode,
        ])['txDetails'];
    }

    /**
     * Notes: 交易签名
     * @Author: <C.Jason>
     * @Date: 2020/4/30 18:47
     * @param string $addr 签名地址
     * @param string $privkey 签名私钥，addr与key可以只输入其一
     * @param string $txHex 交易原始数据
     * @param string $expire 过期时间 GO 格式
     * @param int $index 若是签名交易组，则为要签名的交易序号，从1开始，小于等于0则为签名组内全部交易
     * @return string
     */
    public function sign(string $addr, string $privkey, string $txHex, string $expire, int $index = 0): string
    {
        return $this->client->SignRawTx([
            'addr'    => $addr,
            'privkey' => $privkey,
            'txHex'   => $txHex,
            'expire'  => $expire,
            'index'   => $index,
        ])['txhex'];
    }

}
