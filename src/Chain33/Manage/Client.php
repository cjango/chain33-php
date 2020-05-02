<?php

namespace Jason\Chain33\Manage;

use Jason\Chain33\Kernel\BaseClient;

/**
 * Class Client
 * @package Jason\Chain33\Manage
 */
class Client extends BaseClient
{

    /**
     * Notes: 添加/删除一个token-finisher
     * @Author: <C.Jason>
     * @Date: 2020/5/2 21:41
     * @param string $key 目前支持token-finisher，token-blacklist
     * @param string $value 对应地址
     * @param string $privateKey 管理员私钥
     * @param string $op 操作方法，add 添加，delete 删除
     * @return mixed
     */
    public function finisher(string $value, string $privateKey, string $op = 'add')
    {
        $txHex = $this->client->CreateTransaction([
            'execer'     => 'manage',
            'actionName' => 'Modify',
            'payload'    => [
                'key'   => 'token-finisher',
                'value' => $value,
                'op'    => $op,
                'addr'  => '',
            ],
        ]);

        $data = $this->app->transaction->sign($privateKey, $txHex);

        return $this->app->transaction->send($data);
    }

    /**
     * Notes: 查看finish apprv列表
     * @Author: <C.Jason>
     * @Date: 2020/5/2 21:43
     * @return mixed
     */
    public function get()
    {
        return $this->client->Query([
            'execer'   => 'manage',
            'funcName' => 'GetConfigItem',
            'payload'  => [
                'data' => 'token-finisher',
            ],
        ]);
    }

}
