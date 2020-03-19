<?php

namespace Jason\Chain33\Account;

use Jason\Chain33\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * Notes: 创建一个账户
     * @Author: <C.Jason>
     * @Date: 2020/3/18 21:34
     * @param $label
     * @return string 账户地址
     */
    public function create($label): string
    {
        $this->unlock(false);

        return $this->client->NewAccount([
            'label' => $label,
        ])->acc['addr'];
    }

    /**
     * Notes: 获取账户列表
     * @Author: <C.Jason>
     * @Date: 2020/3/18 21:34
     * @param bool $withoutBalance
     * @return array
     */
    public function get($withoutBalance = false): array
    {
        return $this->client->GetAccounts([
            'withoutBalance' => false,
        ])->wallets;
    }

    /**
     * Notes: 合并账户余额
     * @Author: <C.Jason>
     * @Date: 2020/3/18 21:35
     * @param $to
     * @return array|null
     */
    public function merge($to): ?array
    {
        $this->unlock(false);

        return $this->client->MergeBalance([
            'to' => $to,
        ])->hashes;
    }

    /**
     * 这个应该是用来，将原有的用户恢复到系统上的
     * @param $lable
     * @param $privkey
     * @return array
     */
    public function import($lable, $privkey):array
    {
        $this->unlock(false);

        return $this->client->ImportPrivkey([
            'privkey' => $privkey,
            'label'   => $lable,
        ])->acc;
    }

    /**
     * Notes: 导出私钥
     * @Author: <C.Jason>
     * @Date: 2020/3/18 21:36
     * @param $data
     * @return string
     */
    public function dump($data): string
    {
        $this->unlock(false);

        return $this->client->DumpPrivkey([
            'data' => $data,
        ])->data;
    }

}
