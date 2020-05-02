<?php

namespace Jason\Chain33\Chain;

use Jason\Chain33\Kernel\BaseClient;

/**
 * Class Client
 * @package Jason\Chain33\Chain
 */
class Client extends BaseClient
{

    /**
     * Notes: 获取版本
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:18
     * @return array
     */
    public function version(): array
    {
        return $this->client->Version();
    }

    /**
     * Notes: 获取区间区块
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:20
     * @param int $start 开始区块高度
     * @param int $end 结束区块高度
     * @param bool $isDetail 是否打印区块详细信息
     * @return array
     */
    public function blocks(int $start, int $end, bool $isDetail = false): array
    {
        return $this->client->GetBlocks([
            'start'    => $start,
            'end'      => $end,
            'isDetail' => $isDetail,
        ])['items'];
    }

    /**
     * Notes: 获取最新的区块头
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:23
     * @return array
     */
    public function lastHeader(): array
    {
        return $this->client->GetLastHeader();
    }

    /**
     * Notes: 获取区间区块头
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:25
     * @param int $start 开始区块高度
     * @param int $end 结束区块高度
     * @param bool $isDetail 是否打印区块详细信息
     * @return array
     */
    public function headers(int $start, int $end, bool $isDetail = true): array
    {
        return $this->client->GetHeaders([
            'start'    => $start,
            'end'      => $end,
            'isDetail' => $isDetail,
        ])['items'];
    }

    /**
     * Notes: 获取区块哈希值
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:29
     * @param int $height
     * @return string
     */
    public function hash(int $height): string
    {
        return $this->client->GetBlockHash([
            'height' => $height,
        ])['hash'];
    }

    /**
     * Notes: 获取区块的详细信息
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:31
     * @param string $hash 区块哈希值
     * @return array
     */
    public function overview(string $hash): array
    {
        return $this->client->GetBlockOverview([
            'hash' => $hash,
        ]);
    }

    /**
     * Notes: 获取区块的详细信息
     * @alias overview
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:32
     * @param string $hash 区块哈希值
     * @return array
     */
    public function info(string $hash): array
    {
        return $this->overview($hash);
    }

    /**
     * Notes: 通过区块哈希获取区块信息
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:34
     * @param array $hashs 区块哈希列表
     * @param bool $disableDetail 是否打印区块详细信息
     * @return array
     */
    public function hashes(array $hashs, bool $disableDetail = false): array
    {
        return $this->client->GetBlockByHashes([
            'hashes'        => $hashs,
            'disableDetail' => $disableDetail,
        ])['items'];
    }

    /**
     * Notes: 获取区块的序列信息
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:37
     * @param int $start 开始区块高度
     * @param int $end 结束区块高度
     * @param bool $isDetail 是否打印区块详细信息
     * @return array
     */
    public function sequences(int $start, int $end, bool $isDetail = false): array
    {
        return $this->client->GetBlockSequences([
            'start'    => $start,
            'end'      => $end,
            'isDetail' => $isDetail,
        ])['blkseqInfos'];
    }

    /**
     * Notes: 获取最新区块的序列号
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:43
     * @return int
     */
    public function lastSequences(): int
    {
        return $this->client->GetLastBlockSequence();
    }

    /**
     * Notes: 增加区块序列号变更回调
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:51
     * @param string $name 回调名称，长度不能超过128,
     * @param string $URL 序列号变化通知的URL，长度不能超过1024；当name相同，URL为空时取消通知
     * @return array
     */
    public function addCallBack(string $name, string $URL): array
    {
        return $this->client->AddSeqCallBack([
            'name'     => $name,
            'URL'      => $URL,
            'encode'   => 'json',
            'isHeader' => false,
        ]);
    }

    /**
     * Notes: 列举区块序列号回调
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:52
     * @return array
     */
    public function listCallBack(): array
    {
        return $this->client->ListSeqCallBack()['items'];
    }

    /**
     * Notes: 获取某回调最新序列号的值
     * @Author: <C.Jason>
     * @Date: 2020/4/30 16:57
     * @param string $name 回调名
     * @return int
     */
    public function lastCallBack(string $name): int
    {
        return $this->client->GetSeqCallBackLastNum([
            'data' => $name,
        ])['data'];
    }

}
