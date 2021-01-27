<?php

namespace Jason\Chain33\Oracle;

use Jason\Chain33\Kernel\BaseClient;

/**
 * Class Client
 * @package Jason\Chain33\Oracle
 */
class Client extends BaseClient
{

    /**
     * Notes   : 发布事件
     * @Date   : 2021/1/27 10:45 下午
     * @Author : < Jason.C >
     * @param  string  $type          事件类型
     * @param  string  $subType       事件子类型
     * @param  int     $time          事件结果预计公布时间，UTC时间（时间戳）
     * @param  string  $content       事件内容，例如可以用json格式表示
     * @param  string  $introduction  事件介绍
     * @param  string  $privkey       私钥
     * @return string                 交易结果HASH（事件ID）
     */
    public function publish(
        string $type,
        string $subType,
        int $time,
        string $content,
        string $privkey,
        string $introduction = ''
    ): string {
        $txHex = $this->client->CreateTransaction([
            'execer'     => 'oracle',
            'actionName' => 'EventPublish',
            'payload'    => [
                'type'         => $type,
                'subType'      => $subType,
                'time'         => $time,
                'content'      => $content,
                'introduction' => $introduction,
            ],
        ]);

        $data = $this->app->transcation->sign($privkey, $txHex);

        return $this->app->transcation->send($data);
    }

    /**
     * Notes   : 取消发布事件
     * @Date   : 2021/1/27 10:53 下午
     * @Author : < Jason.C >
     * @param  string  $eventID  发布事件的事件ID
     * @param  string  $privkey  私钥
     * @return string            交易结果HASH
     */
    public function abort(string $eventID, string $privkey)
    {
        $txHex = $this->client->CreateTransaction([
            'execer'     => 'oracle',
            'actionName' => 'EventAbort',
            'payload'    => [
                'eventID' => $eventID,
            ],
        ]);

        $data = $this->app->transcation->sign($privkey, $txHex);

        return $this->app->transcation->send($data);
    }

}
