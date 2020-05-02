<?php

namespace Jason\Chain33\Miner;

use Jason\Chain33\Kernel\BaseClient;

/**
 * Class Client
 * @package Jason\Chain33\Miner
 */
class Client extends BaseClient
{

    /**
     * Notes: 获取执行器地址
     * @Author: <C.Jason>
     * @Date: 2020/4/30 22:21
     * @param string $name
     * @return string
     */
    public function execer(string $name): string
    {
        return $this->client->ConvertExectoAddr([
            'execname' => $name,
        ]);
    }

    /**
     * Notes: 绑定挖矿地址
     * @Author: <C.Jason>
     * @Date: 2020/4/30 22:24
     * @param string $bindAddr 挖矿绑定地址
     * @param string $originAddr 原始地址
     * @param int $amount 用于购买ticket的bty数量
     * @param bool $checkBalance 是否进行额度检查
     * @return string
     */
    public function bind(string $bindAddr, string $originAddr, int $amount = 0, bool $checkBalance = true): string
    {
        return $this->client->CreateBindMiner([
            'bindAddr'     => $bindAddr,
            'originAddr'   => $originAddr,
            'amount'       => $amount,
            'checkBalance' => $checkBalance,
        ], 'ticket')['txhex'];
    }

    /**
     * Notes: 设置自动挖矿
     * @Author: <C.Jason>
     * @Date: 2020/4/30 22:26
     * @param int $flag 标识符，1 为开启自动挖矿，0 为关闭自动挖矿
     * @return bool
     */
    public function auto(int $flag): bool
    {
        return $this->client->SetAutoMining([
            'flag' => $flag,
        ], 'ticket')['isOK'];
    }

    /**
     * Notes: 获取Ticket的数量
     * @Author: <C.Jason>
     * @Date: 2020/4/30 22:29
     * @return int
     */
    public function ticket(): int
    {
        return $this->client->GetTicketCount([], 'ticket');
    }

    /**
     * Notes: 获取绑定的挖矿地址
     * @Author: <C.Jason>
     * @Date: 2020/4/30 22:32
     * @param string $execer 执行器名称
     * @param string $addr 冷钱包地址
     * @return int
     */
    public function addr(string $execer, string $addr): int
    {
        return $this->client->Query([
            'execer'   => $execer,
            'funcName' => 'MinerAddress',
            'payload'  => [
                'data' => $addr,
            ],
        ])['data'];
    }

    /**
     * Notes: 获取矿工地址的对应的冷钱包地址
     * @Author: <C.Jason>
     * @Date: 2020/4/30 22:35
     * @param string $execer 执行器名称
     * @param string $addr 矿工地址
     * @return array
     */
    public function source(string $execer, string $addr): array
    {
        return $this->client->Query([
            'execer'   => $execer,
            'funcName' => 'MinerSourceList',
            'payload'  => [
                'data' => $addr,
            ],
        ])['datas'];
    }

    /**
     * Notes: 关闭指定账户绑定的
     * 可以填空参数close所有当前钱包账户绑定的ticket
     * @Author: <C.Jason>
     * @Date: 2020/4/30 22:37
     * @param string $minerAddress
     * @return array
     */
    public function close(string $minerAddress): array
    {
        return $this->client->CloseTickets([
            'minerAddress' => $minerAddress,
        ], 'ticket')['hashes'];
    }

    /**
     * Notes: 构造买票交易
     * @Author: <C.Jason>
     * @Date: 2020/4/30 22:42
     * @param string $minerAddress 挖矿地址
     * @param string $returnAddress 收益地址，(非委托挖矿时，和挖矿地址一致)
     * @param int $count 买票数量
     * @param int $randSeed 随机数种子
     * @param array $pubHashes
     * @return string
     */
    public function trans(string $minerAddress, string $returnAddress, int $count, int $randSeed, array $pubHashes): string
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
