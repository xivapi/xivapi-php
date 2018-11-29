<?php

namespace XIVAPI\Api;

use GuzzleHttp\RequestOptions;
use XIVAPI\Guzzle\Guzzle;

class PvPTeam
{
    public function search(string $name, string $server, int $page = 1)
    {
        return Guzzle::get("/pvpteam/search", [
            RequestOptions::QUERY => [
                'name'   => $name,
                'server' => ucwords($server),
                'page'   => $page,
            ]
        ]);
    }

    public function get(int $id, array $data = [])
    {
        $options = [
            RequestOptions::QUERY
        ];

        if ($data) {
            $options[RequestOptions::QUERY]['data'] = implode(",", $data);
        }

        return Guzzle::get("/pvpteam/{$id}", $options);
    }

    public function update(int $id)
    {
        return Guzzle::get("/pvpteam/{$id}/update");
    }

    public function delete(int $id)
    {
        return Guzzle::get("/pvpteam/{$id}/delete");
    }
}
