<?php

namespace Jason\Chain33\Exector;

use Jason\Chain33\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * Notes: 获取执行器地址
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:25
     * @param string $name 执行器名称
     * @return mixed
     */
    public function ConvertExectoAddr(string $name)
    {
        return $this->client->ConvertExectoAddr([
            'execname' => $name,
        ]);
    }

    /**
     * Notes: 绑定挖矿地址
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:27
     * @param $bindAddr 挖矿绑定地址
     * @param $originAddr 原始地址
     * @param $amount 用于购买ticket的bty数量
     * @param $checkBalance 是否进行额度检查
     * @return mixed
     */
    public function CreateBindMiner($bindAddr, $originAddr, $amount, $checkBalance)
    {
        return $this->client->ConvertExectoAddr([
            'bindAddr'     => $bindAddr,
            'originAddr'   => $originAddr,
            'amount'       => $amount,
            'checkBalance' => $checkBalance,
        ]);
    }

    /**
     * Notes: 设置自动挖矿
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:28
     * @param int $flag 标识符，1 为开启自动挖矿，0 为关闭自动挖矿。
     * @return mixed
     */
    public function SetAutoMining(int $flag = 1)
    {
        return $this->client->SetAutoMining([
            'flag' => $bindAddr,
        ]);
    }

    /**
     * Notes: 获取绑定的挖矿地址
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:31
     * @param $data 冷钱包地址
     * @return mixed
     */
    public function MinerAddress($data)
    {
        return $this->client->Query([
            'execer'   => 'ticket',
            'funcName' => 'MinerAddress',
            'payload'  => [
                'data' => $data,
            ],
        ]);
    }

    /**
     * Notes: 获取矿工地址的对应的冷钱包地址
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:32
     * @param $data
     * @return mixed
     */
    public function MinerSourceList($data)
    {
        return $this->client->Query([
            'execer'   => 'ticket',
            'funcName' => 'MinerSourceList',
            'payload'  => [
                'data' => $data,
            ],
        ]);
    }

    /**
     * Notes: 关闭指定账户绑定的tickets
     * 可以填空参数close所有当前钱包账户绑定的ticket
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:33
     * @param $minerAddress
     * @return mixed
     */
    public function close($minerAddress)
    {
        return $this->client->CloseTickets([
            'minerAddress' => $minerAddress,
        ], 'ticket');
    }

    /**
     * Notes: 构造买票交易
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:38
     * @param $minerAddress 挖矿地址
     * @param $returnAddress 收益地址，(非委托挖矿时，和挖矿地址一致)
     * @param $count 买票数量
     * @param $randSeed 随机数种子
     * @param $pubHashes 数组长度为count, 每个pubHash 用随机的源字符串通过SHA256算法生成。 挖矿时需要公布生成pubHash的源字符串，源字符串用于生成链上随机数
     * @return mixed
     */
    public function CreateTransaction($minerAddress, $returnAddress, $count, $randSeed, $pubHashes)
    {
        return $this->client->CreateTransaction([
            'execer'     => 'ticket',
            'actionName' => 'Topen',
            'payload'    => [
                'minerAddress'  => $minerAddress,
                'returnAddress' => $returnAddress,
                'count'         => $count,
                'randSeed'      => $randSeed,
                'pubHashes'     => $pubHashes,
            ],
        ]);
    }

}
