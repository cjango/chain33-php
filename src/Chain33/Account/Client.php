<?php

namespace Jason\Chain33\Account;

use Jason\Chain33\Kernel\BaseClient;
use StephenHill\Base58;

/**
 * Class Client
 * @package Jason\Chain33\Account
 */
class Client extends BaseClient
{

    /**
     * Notes   : 本地生成 钱包地址 与 私钥
     * @Date   : 2021/1/28 10:20 上午
     * @Author : < Jason.C >
     * @return array
     */
    public function local(): array
    {
        $config = [
            'private_key_type' => OPENSSL_KEYTYPE_EC,
            'curve_name'       => 'secp256k1',
        ];
        $pkey   = openssl_pkey_new($config);
        $detail = openssl_pkey_get_details($pkey);

        return [
            'address'    => $this->getAddress($detail),
            'privateKey' => '0x' . strtoupper(bin2hex($detail['ec']['d'])),
        ];
    }

    /**
     * Notes   : 获取钱包地址
     * @Date   : 2021/1/28 11:16 上午
     * @Author : < Jason.C >
     * @param  array  $detail  私钥信息
     * @return string
     */
    private function getAddress(array $detail): string
    {
        $x = str_pad(bin2hex($detail['ec']['x']), 64, '0', STR_PAD_LEFT);
        $y = bin2hex($detail['ec']['y']);
        if (intval(substr($y, -1), 16) % 2 == 0) {
            $pubKey = '02' . $x;
        } else {
            $pubKey = '03' . $x;
        }

        $ripem160    = hash('ripemd160', hex2bin(hash('sha256', hex2bin($pubKey))));
        $with_prefix = $this->config['version'] . $ripem160;
        $checksum    = hash('sha256', hex2bin(hash('sha256', hex2bin($with_prefix))));
        $address     = $with_prefix . substr($checksum, 0, 8);

        return (new Base58())->encode(hex2bin($address));
    }

    /**
     * Notes   : 创建一个账户
     * @Author : <C.Jason>
     * @Date   : 2020/3/18 21:34
     * @param  string  $label  账户标签
     * @return string 账户地址
     */
    public function create(string $label): string
    {
        $this->unlock();

        return $this->client->NewAccount([
            'label' => $label,
        ])['acc']['addr'];
    }

    /**
     * Notes   : 修改账户的标签
     * @Date   : 2021/1/28 11:48 上午
     * @Author : < Jason.C >
     * @param  string  $addr   账户地址
     * @param  string  $label  待设置的标签
     * @return array
     */
    public function setLabel(string $addr, string $label): array
    {
        return $this->client->SetLabl([
            'addr'  => $addr,
            'label' => $label,
        ]);
    }

    /**
     * Notes   : 获取账户列表
     * @Date   : 2021/1/28 11:20 上午
     * @Author : < Jason.C >
     * @param  bool  $withoutBalance  false， 将返回account 的帐号信息。 为true 则返回 label 和 addr 信息， 其他信息为 0
     * @return array
     */
    public function get(bool $withoutBalance = true): array
    {
        return $this->client->GetAccounts([
            'withoutBalance' => $withoutBalance,
        ])['wallets'];
    }

    /**
     * Notes   : 导入私钥
     * @Author : <C.Jason>
     * @Date   : 2020/4/30 17:21
     * @param  string  $label       账户标签
     * @param  string  $privateKey  账户私钥
     * @return array
     */
    public function import(string $label, string $privateKey): array
    {
        $this->unlock();

        return $this->client->ImportPrivkey([
            'privkey' => $privateKey,
            'label'   => $label,
        ]);
    }

    /**
     * Notes   : 导出私钥
     * @Author : <C.Jason>
     * @Date   : 2020/3/18 21:36
     * @param  string  $addr  待导出私钥的账户地址
     * @return array
     */
    public function export(string $addr): array
    {
        $this->unlock();

        $privateKey = $this->client->DumpPrivkey([
            'data' => $addr,
        ])['data'];

        return [
            'address'    => $addr,
            'privateKey' => str_replace('0X', '0x', strtoupper($privateKey)),
        ];
    }

}
