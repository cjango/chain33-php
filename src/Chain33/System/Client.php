<?php

namespace Jason\Chain33\System;

use Jason\Chain33\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * Notes: 获取远程节点列表
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:02
     * @return mixed
     */
    public function peer()
    {
        return $this->client->GetPeerInfo()->peers;
    }

    /**
     * Notes: 查询节点状态
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:02
     * @return mixed
     */
    public function net()
    {
        return $this->client->GetNetInfo();
    }

    /**
     * Notes: 查询时间状态
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:02
     * @return mixed
     */
    public function time()
    {
        return $this->client->GetTimeStatus();
    }

    /**
     * Notes: 查询同步状态
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:02
     * @return mixed
     */
    public function isSync()
    {
        return $this->client->IsSync();
    }

}
