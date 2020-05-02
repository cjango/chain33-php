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
        $txHex = $this->client->CreateRawTokenPreCreateTx([
            'name'         => $symbol,
        ], 'token');

        $data = $this->app->transaction->sign($privateKey, $txHex);

        return $this->app->transaction->send($data);
    }

    public function hash(string $content, string $privateKey)
    {
        $txHex = $this->client->CreateRawTokenPreCreateTx([
            'name'         => $symbol,
        ], 'token');

        $data = $this->app->transaction->sign($privateKey, $txHex);

        return $this->app->transaction->send($data);
    }

    public function link(string $content, string $privateKey)
    {
        $txHex = $this->client->CreateRawTokenPreCreateTx([
            'name'         => $symbol,
        ], 'token');

        $data = $this->app->transaction->sign($privateKey, $txHex);

        return $this->app->transaction->send($data);
    }

    function query(string $hash) {

    }
}
