<?php

namespace Jason\Chain33\Wallet;

use Jason\Chain33\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * 创建一个钱包
     * @param $password
     * @return bool
     */
    public function create($password): bool
    {
        $seed = $this->client->GenSeed([
            'lang' => 0,
        ]);

        return $this->client->SaveSeed([
            'seed'   => $seed->seed,
            'passwd' => $password,
        ])->isOK;
    }

    /**
     * 获取钱包助记词
     * @return string
     */
    public function getSeed(): string
    {
        $this->unlock(false);

        return $this->client->GetSeed([
            'passwd' => $this->config['password'],
        ])->seed;
    }

    /**
     * Notes: 修改密码
     * @Author: <C.Jason>
     * @Date: 2020/3/18 21:38
     * @param $old
     * @param $new
     * @return bool
     */
    public function password($old, $new): bool
    {
        return $this->client->SetPasswd([
            'oldPass' => $old,
            'newPass' => $new,
        ])->isOK;
    }

    /**
     * Notes: 钱包状态
     * @Author: <C.Jason>
     * @Date: 2020/3/18 21:38
     * @return mixed
     */
    public function status()
    {
        return $this->client->GetWalletStatus();
    }

    /**
     * Notes: 设置交易费用
     * @Author: <C.Jason>
     * @Date: 2020/3/18 21:38
     * @param $amount
     * @return bool
     */
    public function setFee($amount): bool
    {
        $this->unlock(false);

        return $this->client->SetTxFee([
            'amount' => $amount,
        ])->isOK;
    }

    /**
     * Notes:
     * @Author: <C.Jason>
     * @Date: 2020/3/18 21:39
     * @param $from
     * @param $to
     * @param $amount
     * @param $note
     * @param $isToken
     * @param $tokenSymbol
     * @return mixed
     */
    public function send($from, $to, $amount, $note, $isToken, $tokenSymbol)
    {
        $this->unlock(false);

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
     * Notes:
     * @Author: <C.Jason>
     * @Date: 2020/3/18 21:39
     * @param $fromTx
     * @param $count
     * @param $direction
     * @param $mode
     * @param $sendRecvPrivacy
     * @param $address
     * @param $tokenname
     * @return mixed
     */
    public function txList($fromTx, $count, $direction, $mode, $sendRecvPrivacy, $address, $tokenname)
    {
        return $this->client->WalletTxList([
            'fromTx'          => $fromTx,
            'count'           => $count,
            'direction'       => $direction,
            'mode'            => $mode,
            'sendRecvPrivacy' => $sendRecvPrivacy,
            'address'         => $address,
            'tokenname'       => $tokenname,
        ]);
    }

    /**
     * Notes:
     * @Author: <C.Jason>
     * @Date: 2020/3/18 21:40
     * @param $addr
     * @param $privkey
     * @param $txHex
     * @param $expire
     * @param $index
     * @param $fee
     * @param $token
     * @param $newToAddr
     * @return mixed
     */
    public function sign($addr, $privkey, $txHex, $expire, $index, $fee, $token, $newToAddr)
    {
        return $this->client->SignRawTx([
            'addr'      => $addr,
            'privkey'   => $privkey,
            'txHex'     => $txHex,
            'expire'    => $expire,
            'index'     => $index,
            'fee'       => $fee,
            'token'     => $token,
            'newToAddr' => $newToAddr,
        ]);
    }

}
