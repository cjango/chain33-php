<?php

namespace Jason\Chain33\Manage;

use Jason\Chain33\Kernel\BaseClient;
use Jason\Chain33\Kernel\Consts;

/**
 * Class Client
 * @package Jason\Chain33\Manage
 */
class Client extends BaseClient
{

    /**
     * Notes: 添加/删除一个token-finisher
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 21:41
     * @param  string  $value  对应地址
     * @param  string  $op     操作方法，add 添加，delete 删除
     * @param  string  $type   token-finisher , token-blacklist
     * @return string
     */
    public function finisher(string $value, string $op = Consts::OP_ADD, string $type = Consts::TOKEN_FINISHER): string
    {
        $txHex = $this->client->CreateTransaction([
            'execer'     => 'manage',
            'actionName' => 'Modify',
            'payload'    => [
                'key'   => $type,
                'value' => $value,
                'op'    => $op,
                'addr'  => '',
            ],
        ]);

        $data = $this->app->transaction->sign($this->config['superManager']['privateKey'], $txHex);

        return $this->app->transaction->send($data);
    }

    /**
     * Notes: 查看finish apprv列表
     * @Author: <C.Jason>
     * @Date  : 2020/5/2 21:43
     * @param  string  $type  操作标识符
     * @return mixed
     */
    public function get($type = Consts::TOKEN_FINISHER)
    {
        return $this->client->Query([
            'execer'   => 'manage',
            'funcName' => 'GetConfigItem',
            'payload'  => [
                'data' => $type,
            ],
        ]);
    }

}
