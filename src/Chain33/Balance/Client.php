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
     * @Date  : 2020/4/30 22:48
     * @param array  $addresses    要查询的地址列表
     * @param string $execer       执行器名称，coins查询可用的主代币，ticket查询正在挖矿的主代币
     * @param string $asset_exec   资产原始合约名称，如bty在coins合约中产生，各种token在token合约中产生，跨链的资产在paracross合约中
     * @param string $asset_symbol 资产名称，如 bty,token的各种 symbol，跨链的bty名称为 coins.bty, 跨链的token为token.symbol
     * @param string $stateHash    状态Hash
     * @return array
     */
    public function get(array $addresses, string $execer = 'coins', string $asset_exec = '', string $asset_symbol = '', string $stateHash = ''): array
    {
        return $this->client->GetBalance([
            'execer'       => $execer,
            'addresses'    => $addresses,
            'asset_exec'   => $asset_exec,
            'asset_symbol' => $asset_symbol,
            'stateHash'    => $stateHash,
        ]);
    }

    /**
     * Notes: 查询地址token余额
     * @Author: <C.Jason>
     * @Date  : 2020/4/30 22:50
     * @param array  $addresses   要查询的地址列表
     * @param string $tokenSymbol token符号名称
     * @return array
     */
    public function token(array $addresses, string $tokenSymbol): array
    {
        return $this->client->GetTokenBalance([
            'execer'      => 'token',
            'tokenSymbol' => $tokenSymbol,
            'addresses'   => $addresses,
        ], 'token');
    }

    /**
     * Notes: 查询地址所有合约地址余额
     * @Author: <C.Jason>
     * @Date  : 2020/4/30 22:53
     * @param string $addr   要查询的地址
     * @param string $symbol 代币名称
     * @return array|null
     */
    public function all(string $addr, string $symbol): ?array
    {
        return $this->client->GetAllExecBalance([
            'addr'         => $addr,
            'execer'       => 'token',
            'asset_exec'   => 'token',
            'asset_symbol' => $symbol,
        ]);
    }

}
