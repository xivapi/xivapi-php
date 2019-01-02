<?php

namespace XIVAPI\Api;

use GuzzleHttp\RequestOptions;
use XIVAPI\Guzzle\Guzzle;

class Character
{
    public function search(string $name, string $server, int $page = 1)
    {
        return Guzzle::get("/character/search", [
            RequestOptions::QUERY => [
                'name'   => $name,
                'server' => ucwords($server),
                'page'   => $page,
            ]
        ]);
    }

    public function get(int $id, array $data = [], bool $extended = false)
    {
        $options = [
            RequestOptions::QUERY
        ];

        if ($data) {
            $options[RequestOptions::QUERY]['data'] = implode(",", $data);
        }

        if ($extended) {
            $options[RequestOptions::QUERY]['extended'] = 1;
        }

        return Guzzle::get("/character/{$id}", $options);
    }

    public function verify(int $id)
    {
        return Guzzle::get("/character/{$id}/verification");
    }

    public function update(int $id)
    {
        return Guzzle::get("/character/{$id}/update");
    }

    public function delete(int $id)
    {
        return Guzzle::get("/character/{$id}/delete");
    }
}
