<?php

namespace XIVAPI\Api;

use GuzzleHttp\RequestOptions;
use XIVAPI\Guzzle\Guzzle;

class Linkshell
{
    public function search(string $name, string $server, int $page = 1)
    {
        return Guzzle::get("/linkshell/search", [
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

        return Guzzle::get("/linkshell/{$id}", $options);
    }

    public function update(int $id)
    {
        return Guzzle::get("/linkshell/{$id}/update");
    }

    public function delete(int $id)
    {
        return Guzzle::get("/linkshell/{$id}/delete");
    }
}
