<?php

namespace Jason\Chain33\Account;

use Jason\Chain33\Kernel\BaseClient;
use Jason\Chain33\Kernel\Support\Base58;

class Client extends BaseClient
{

    const PEM_REGEX = '/' .
                      /* line start */
                      '(?:^|[\r\n])' .
                      /* header */
                      '-----BEGIN (.+?)-----[\r\n]+' .
                      /* payload */
                      '(.+?)' .
                      /* trailer */
                      '[\r\n]+-----END \\1-----' .
                      '/ms';

    public function fromString(string $str)
    {
        if (!preg_match(self::PEM_REGEX, $str, $match)) {
            throw new \UnexpectedValueException('Not a PEM formatted string.');
        }
        $payload = preg_replace('/\s+/', '', $match[2]);

        return base64_decode($payload, true);
    }

    public function local()
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

    protected function getAddress($keyDetail)
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
        $hex_with_prefix = '00' . $ripem160;
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
     * @Date  : 2020/3/18 21:34
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
     * @Date  : 2020/3/18 21:35
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
    public function import($lable, $privkey): array
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
     * @Date  : 2020/3/18 21:36
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
