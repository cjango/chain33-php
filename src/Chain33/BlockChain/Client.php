<?php

namespace Jason\Chain33\BlockChain;

use Jason\Chain33\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * Notes: 获取版本
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:05
     * @return mixed
     */
    public function version()
    {
        return $this->client->Version();
    }

    /**
     * Notes: 获取区间区块
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:07
     * @param int $start
     * @param int $end
     * @param bool $isDetail
     * @return mixed
     */
    public function get(int $start, int $end, bool $isDetail)
    {
        return $this->client->GetBlocks([
            'start'    => $start,
            'end'      => $end,
            'isDetail' => $isDetail,
        ]);
    }

    /**
     * Notes: 获取最新的区块头
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:07
     */
    public function lastHeader()
    {
        return $this->client->GetLastHeader();
    }

    /**
     * Notes: 获取区间区块头
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:08
     */
    public function headers(int $start, int $end, bool $isDetail)
    {
        return $this->client->GetHeaders([
            'start'    => $start,
            'end'      => $end,
            'isDetail' => $isDetail,
        ]);
    }

    /**
     * Notes: 获取区块哈希值
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:09
     * @param int $height
     * @return mixed
     */
    public function GetBlockHash(int $height)
    {
        return $this->client->GetBlockHash([
            'height' => $height,
        ]);
    }

    /**
     * Notes: 获取区块的详细信息
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:10
     * @param $hash
     * @return mixed
     */
    public function hash(string $hash)
    {
        return $this->client->GetBlockOverview([
            'hash' => $hash,
        ]);
    }

    /**
     * Notes: 通过区块哈希获取区块信息
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:12
     * @param $hashs
     * @param $detail
     * @return mixed
     */
    public function hashs(array $hashs, bool $detail)
    {
        return $this->client->GetBlockByHashes([
            'hashs'         => $hashs,
            'disableDetail' => $detail,
        ]);
    }

    /**
     * Notes: 获取区块的序列信息
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:13
     * @param int $start
     * @param int $end
     * @param bool $isDetail
     * @return mixed
     */
    public function GetBlockSequences(int $start, int $end, bool $isDetail)
    {
        return $this->client->GetBlockSequences([
            'start'    => $start,
            'end'      => $end,
            'isDetail' => $isDetail,
        ]);
    }

    /**
     * Notes: 获取最新区块的序列号
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:14
     * @return mixed
     */
    public function GetLastBlockSequence()
    {
        return $this->client->GetLastBlockSequence();
    }

    /**
     * Notes: 增加区块序列号变更回调
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:15
     */
    public function AddSeqCallBack()
    {
        return $this->client->AddSeqCallBack([
            'name'          => $name,
            'URL'           => $URL,
            'encode'        => $encode,
            'isHeader'      => $isHeader,
            'lastSequence'  => $lastSequence,
            'lastHeader'    => $lastHeader,
            'lastBlockHash' => $lastBlockHash,
        ]);
    }

    /**
     * Notes: 列举区块序列号回调
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:17
     * @return mixed
     */
    public function ListSeqCallBack()
    {
        return $this->client->ListSeqCallBack();
    }

    /**
     * Notes: 获取某回调最新序列号的值
     * @Author: <C.Jason>
     * @Date: 2020/3/19 15:18
     * @param $data
     * @return mixed
     */
    public function GetSeqCallBackLastNum($data)
    {
        return $this->client->GetSeqCallBackLastNum([
            'data' => $data,
        ]);
    }

}
