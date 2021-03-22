<?php

namespace Jason\Chain33\Storage;

use Illuminate\Support\Str;
use Jason\Chain33\Kernel\BaseClient;
use Jason\Chain33\Kernel\Protobuf\ContentOnlyNotaryStorage;
use Jason\Chain33\Kernel\Protobuf\HashOnlyNotaryStorage;
use Jason\Chain33\Kernel\Protobuf\LinkNotaryStorage;
use Jason\Chain33\Kernel\Protobuf\StorageAction;
use Jason\Chain33\Kernel\Protobuf\Transaction;

/**
 * Class Client
 * @package Jason\Chain33\Storage
 */
class Client extends BaseClient
{

    /**
     * Notes: 明文存证9
     * @Author: <C.Jason>
     * @Date  : 2020/5/19 3:43 下午
     * @param  string  $content
     * @param  string  $to
     * @param  string  $privateKey
     * @return mixed
     */
    public function content(string $content, string $privateKey)
    {
        $con = new ContentOnlyNotaryStorage();
        $con->setContent($content);
        $con->setOp(0);

        $storage = new StorageAction();
        $storage->setContentStorage($con);
        $storage->setTy(1);

        return $this->sendTransaction($storage, $privateKey);
    }

    /**
     * Notes: Hash存证
     * @Author: <C.Jason>
     * @Date  : 2020/5/19 3:43 下午
     * @param  string  $hash
     * @param  string  $to
     * @param  string  $privateKey
     * @return mixed
     */
    public function hash(string $hash, string $privateKey)
    {
        $con = new HashOnlyNotaryStorage();
        $con->setHash(hash('sha256', $hash));
        $con->setValue($hash);

        $storage = new StorageAction();
        $storage->setHashStorage($con);
        $storage->setTy(2);

        return $this->sendTransaction($storage, $privateKey);
    }

    /**
     * Notes: 链接存证
     * @Author: <C.Jason>
     * @Date  : 2020/5/19 3:43 下午
     * @param  string  $link
     * @param  string  $content
     * @param  string  $to
     * @param  string  $privateKey
     * @return mixed
     */
    public function link(string $link, string $content, string $privateKey)
    {
        $con = new LinkNotaryStorage();
        $con->setLink($link);
        $con->setHash(hash('sha256', $content));
        $con->setValue($content);

        $storage = new StorageAction();
        $storage->setLinkStorage($con);
        $storage->setTy(3);

        return $this->sendTransaction($storage, $privateKey);
    }

    //EncryptNotaryStorage(4),
    //EncryptShareNotaryStorage (5),
    //EncryptNotaryAdd(6);

    /**
     * Notes: 发送存证数据
     * @Author: <C.Jason>
     * @Date  : 2020/5/19 3:44 下午
     * @param  \Jason\Chain33\Kernel\Protobuf\StorageAction  $storage
     * @param  string                                        $to
     * @param  string                                        $privateKey
     * @return mixed
     */
    private function sendTransaction(StorageAction $storage, string $privateKey)
    {
        $Trans = new Transaction();
        $Trans->setExecer($this->parseExecer('storage'));
        $Trans->setTo($this->app->miner->execer($this->parseExecer('storage')));
        $Trans->setFee(0);
        $Trans->setNonce(mt_rand() * rand(10000, 99999));
        $Trans->setPayload($storage->serializeToString());

        $hexString = bin2hex($Trans->serializeToString());

        // 平行链必须要代扣
        $hexString = $this->app->transaction->paraTransaction($hexString);

        $data = $this->app->transaction->sign($privateKey, $hexString);

        return $this->app->transaction->send($data);
    }

    /**
     * Notes: 存证结果查询
     * @Author: <C.Jason>
     * @Date  : 2020/5/19 3:46 下午
     * @param  string  $hash
     * @return false|false[]|string|string[]
     */
    public function query(string $hash)
    {
        $content = $this->client->Query([
            'execer'   => 'storage',
            'funcName' => 'QueryStorage',
            'payload'  => [
                'txHash' => $hash,
            ],
        ]);
        if (array_key_exists('contentStorage', $content)) {
            return [
                'content' => $this->hexToStr($content['contentStorage']['content']),
                'key'     => $content['contentStorage']['value'],
                'op'      => $content['contentStorage']['op'],
                'value'   => $content['contentStorage']['value'],
            ];
        }
        if (array_key_exists('hashStorage', $content)) {
            return [
                'hash'  => $this->hexToStr($content['hashStorage']['hash']),
                'key'   => $content['hashStorage']['key'],
                'value' => $content['hashStorage']['value'],
            ];
        }
        if (array_key_exists('linkStorage', $content)) {
            return [
                'link'  => $this->hexToStr($content['linkStorage']['link']),
                'hash'  => $this->hexToStr($content['linkStorage']['hash']),
                'key'   => $content['linkStorage']['key'],
                'value' => $content['linkStorage']['value'],
            ];
        }

        return $content;
    }

    /**
     * Notes: 存证结果查询
     * @Author: <C.Jason>
     * @Date  : 2020/5/19 3:45 下午
     * @param $hex
     * @return false|string
     */
    private function hexToStr($hex)
    {
        if (Str::startsWith($hex, '0x')) {
            $hex = Str::substr($hex, 2);
        }

        return hex2bin($hex);
    }

}
