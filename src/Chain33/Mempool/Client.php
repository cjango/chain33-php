<?php

namespace Jason\Chain33\Mempool;

use Jason\Chain33\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * Notes: 获取 Mempool
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:20
     * @param bool $isAll
     * @return mixed
     */
    protected function get(bool $isAll = false)
    {
        return $this->client->GetMempool([
            'isAll' => $isAll,
        ]);
    }

}
