<?php

namespace Jason\Chain33\Mempool;

use Jason\Chain33\Kernel\BaseClient;

/**
 * Class Client
 * @package Jason\Chain33\Mempool
 */
class Client extends BaseClient
{

    /**
     * Notes   : 获取交易池
     * @Date   : 2021/1/27 11:00 下午
     * @Author : < Jason.C >
     * @param  false  $isAll  是否获取全部交易信息
     * @return array
     */
    public function get($isAll = false): array
    {
        return $this->client->GetMempool([
            'isAll' => $isAll,
        ])['txs'];
    }

}
