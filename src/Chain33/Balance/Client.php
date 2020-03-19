<?php

namespace Jason\Chain33\Balance;

use Jason\Chain33\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * Notes: 查询地址余额
     * @Author: <C.Jason>
     * @Date: 2020/3/19 14:53
     * @param string|array $address
     * @param string $execer
     * @return mixed
     */
    public function get($address, $execer = 'coins')
    {
        return $this->client->GetBalance([
            'addresses' => $this->parseAddresses($address),
            'execer'    => $execer,
        ]);
    }

    /**
     * Notes: 查询地址token余额
     * @Author: <C.Jason>
     * @Date: 2020/3/19 14:56
     * @param $address
     * @param string $execer
     * @param string $symbol
     * @return mixed
     */
    public function token($address, $execer = 'token', $symbol = 'token')
    {
        return $this->client->GetBalance([
            'addresses'   => $this->parseAddresses($address),
            'execer'      => $execer,
            'tokenSymbol' => $symbol,
        ]);
    }

    /**
     * Notes: 查询地址所有合约地址余额
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:01
     * @param string $address
     * @return mixed
     */
    public function all(string $address)
    {
        return $this->client->GetAllExecBalance([
            'addr' => $address,
        ]);
    }

    /**
     * Notes: 解析地址
     * @Author: <C.Jason>
     * @Date: 2020/3/19 14:58
     * @param $address
     * @return array
     */
    protected function parseAddresses($address): array
    {
        $addresses = [];
        if (is_string($address)) {
            $addresses = [$address];
        } elseif (is_array($address)) {
            $addresses = $address;
        }

        return $addresses;
    }

}
