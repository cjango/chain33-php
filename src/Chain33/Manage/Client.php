<?php

namespace Jason\Chain33\Manage;

use Jason\Chain33\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * Notes: 添加一个 token-finisher
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:47
     * @param $key 目前支持token-finisher，token-blacklist
     * @param $addr 对应地址
     * @return mixed
     */
    public function create($key, $addr)
    {
        return $this->client->CreateTransaction([
            'execer'     => 'manage',
            'actionName' => 'Modify',
            'payload'    => [
                'key'   => $key,
                'value' => $addr,
                'op'    => 'add',
                'addr'  => $addr,
            ],
        ]);
    }

    /**
     * Notes: 删除一个 token-finisher
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:47
     * @param $key 目前支持token-finisher，token-blacklist
     * @param $addr 对应地址
     * @return mixed
     */
    public function delete($key, $addr)
    {
        return $this->client->CreateTransaction([
            'execer'     => 'manage',
            'actionName' => 'Modify',
            'payload'    => [
                'key'   => $key,
                'value' => $addr,
                'op'    => 'delete',
                'addr'  => $addr,
            ],
        ]);
    }

    /**
     * Notes:
     * @Author: <C.Jason>
     * @Date: 2020/3/19 17:46
     * @param $data 具体数据，这里是token-finisher. 指定查询的是 finish apprv列表
     * @return mixed
     */
    public function query($data)
    {
        return $this->client->Query([
            'execer'     => 'manage',
            'actionName' => 'GetConfigItem',
            'payload'    => [
                'data' => $data,
            ],
        ]);
    }

}
