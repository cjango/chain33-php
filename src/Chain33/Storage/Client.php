<?php

namespace Jason\Chain33\Storage;

use Jason\Chain33\Kernel\BaseClient;

/**
 * Class Client
 * @package Jason\Chain33\Storage
 */
class Client extends BaseClient
{

    public function content(string $content, string $privateKey)
    {
        $con = new \Types\ContentOnlyNotaryStorage();
        $con->setContent($content);
        $con->setKey('');
        $con->setOp(0);

        $storage = new \Types\StorageAction();
        $storage->setContentStorage($con);
        $storage->setTy(1);

        $trans = new \Types\Transaction();

        $trans->setExecer('storage');
        $trans->setTo('1Af1JWXYVJwMrSkC7QpG4KVckNKgXmnhm4');
        $trans->setFee(100000);
        $trans->setNonce(mt_rand() * rand(10000, 99999));
        $trans->setPayload($storage->serializeToString());
        $data = $this->app->transaction->sign($privateKey, bin2hex($trans->serializeToString()));

        return $this->app->transaction->send($data);
    }

    public function hash(string $content, string $privateKey)
    {
        $txHex = $this->client->CreateRawTokenPreCreateTx([
            'name' => $symbol,
        ], 'token');

        $data = $this->app->transaction->sign($privateKey, $txHex);

        return $this->app->transaction->send($data);
    }

    public function link(string $content, string $privateKey)
    {
        $txHex = $this->client->CreateRawTokenPreCreateTx([
            'name' => $symbol,
        ], 'token');

        $data = $this->app->transaction->sign($privateKey, $txHex);

        return $this->app->transaction->send($data);
    }

    function query(string $hash)
    {

    }

}
