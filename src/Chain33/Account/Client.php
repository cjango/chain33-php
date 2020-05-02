<?php

namespace Jason\Chain33\Account;

use Jason\Chain33\Kernel\BaseClient;
use Jason\Chain33\Kernel\Support\Base58;

/**
 * Class Client
 * @package Jason\Chain33\Account
 */
class Client extends BaseClient
{

    /**
     * Notes: 本地生成私钥-钱包地址
     * @Author: <C.Jason>
     * @Date: 2020/4/30 15:01
     * @return array
     */
    public function local(): array
    {
        $config = [
            'private_key_type' => OPENSSL_KEYTYPE_EC,
            'curve_name'       => 'secp256k1',
        ];
        $res    = openssl_pkey_new($config);
        openssl_pkey_export($res, $priv_key);
        $keyDetail = openssl_pkey_get_details($res);

        return [
            'privateKey' => bin2hex($keyDetail['ec']['d']),
            'address'    => $this->getAddress($keyDetail),
        ];
    }

    /**
     * Notes: 获取钱包地址
     * @Author: <C.Jason>
     * @Date: 2020/4/30 15:00
     * @param $keyDetail
     * @return string
     */
    protected function getAddress($keyDetail): string
    {
        $x = str_pad(bin2hex($keyDetail['ec']['x']), 64, '0', STR_PAD_LEFT);
        $y = str_pad(bin2hex($keyDetail['ec']['y']), 64, '0', STR_PAD_LEFT);

        if (gmp_strval(gmp_mod(gmp_init($y, 16), gmp_init(2, 10))) == 0) {
            $derPubKey = '02' . $x;
        } else {
            $derPubKey = '03' . $x;
        }
        // 比特币的地址算法
        $sha256   = hash('sha256', hex2bin($derPubKey));
        $ripem160 = hash('ripemd160', hex2bin($sha256));
        // 加入区块链版本 00
        $hex_with_prefix = $this->config['version'] . $ripem160;
        // 校验码
        $sha256   = hash('sha256', hex2bin($hex_with_prefix));
        $checksum = hash('sha256', hex2bin($sha256));

        $address = $hex_with_prefix . substr($checksum, 0, 8);

        return (new \StephenHill\Base58())->encode(hex2bin($address));
    }

    /**
     * Notes: 创建一个账户
     * @Author: <C.Jason>
     * @Date  : 2020/3/18 21:34
     * @param string $label 账户标签
     * @return string 账户地址
     */
    public function create(string $label): string
    {
        $this->unlock(false);

        return $this->client->NewAccount([
            'label' => $label,
        ])['acc']['addr'];
    }

    /**
     * Notes: 获取账户列表
     * @Author: <C.Jason>
     * @Date  : 2020/3/18 21:34
     * @param bool $withoutBalance 返回 label 和 addr 信息
     * @return array
     */
    public function get(bool $withoutBalance = false): array
    {
        return $this->client->GetAccounts([
            'withoutBalance' => false,
        ])['wallets'];
    }

    /**
     * Notes: 合并账户余额
     * @Author: <C.Jason>
     * @Date  : 2020/3/18 21:35
     * @param string $to 合并钱包上的所有余额到一个账户地址
     * @return array|null
     */
    public function merge(string $to): ?array
    {
        $this->unlock(false);

        return $this->client->MergeBalance([
            'to' => $to,
        ])['hashes'];
    }

    /**
     * Notes: 导入私钥
     * @Author: <C.Jason>
     * @Date: 2020/4/30 17:21
     * @param string $lable 账户标签
     * @param string $privkey 账户私钥
     * @return string
     */
    public function import(string $lable, string $privkey): string
    {
        $this->unlock(false);

        return $this->client->ImportPrivkey([
            'privkey' => $privkey,
            'label'   => $lable,
        ])['acc']['addr'];
    }

    /**
     * Notes: 导出私钥
     * @Author: <C.Jason>
     * @Date  : 2020/3/18 21:36
     * @param string $addr 待导出私钥的账户地址
     * @return string
     */
    public function dump(string $addr): string
    {
        $this->unlock(false);

        return $this->client->DumpPrivkey([
            'data' => $addr,
        ])['data'];
    }

}
