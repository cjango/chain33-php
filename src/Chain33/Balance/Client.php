<?php

namespace Jason\Chain33\Balance;

use Jason\Chain33\Kernel\BaseClient;

/**
 * Class Client
 * @package Jason\Chain33\Balance
 */
class Client extends BaseClient
{

    /**
     * Notes: 查询地址余额
     * @Author: <C.Jason>
     * @Date: 2020/4/30 22:48
     * @param string $execer 执行器名称，coins 查询可用的主代币 ，ticket 查询正在挖矿的主代币
     * @param array $addresses 要查询的地址列表
     * @return array
     */
    public function get(string $execer, array $addresses): array
    {
        return $this->client->GetBalance([
            'execer'    => $execer,
            'addresses' => $addresses,
        ]);
    }

    /**
     * Notes: 查询地址token余额
     * @Author: <C.Jason>
     * @Date: 2020/4/30 22:50
     * @param string $execer token 查询可用的余额 ，trade 查询正在交易合约里的token
     * @param string $tokenSymbol token符号名称
     * @param array $addresses 要查询的地址列表
     * @return array
     */
    public function token(string $execer, string $tokenSymbol, array $addresses): array
    {
        return $this->client->GetTokenBalance([
            'execer'      => $execer,
            'tokenSymbol' => $tokenSymbol,
            'addresses'   => $addresses,
        ]);
    }

    /**
     * Notes: 查询地址所有合约地址余额
     * @Author: <C.Jason>
     * @Date: 2020/4/30 22:53
     * @param string $addr 要查询的地址
     * @return array|null
     */
    public function all(string $addr): ?array
    {
        return $this->client->GetAllExecBalance([
            'addr' => $addr,
        ])['execAccount'];
    }

}
