<?php

namespace XIVAPI\Api;

use GuzzleHttp\RequestOptions;
use XIVAPI\Guzzle\Guzzle;

class FreeCompany
{
    public function search(string $name, string $server, int $page = 1)
    {
        return Guzzle::get("/freecompany/search", [
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

        return Guzzle::get("/freecompany/{$id}", $options);
    }

    public function update(int $id)
    {
        return Guzzle::get("/freecompany/{$id}/update");
    }

    public function delete(int $id)
    {
        return Guzzle::get("/freecompany/{$id}/delete");
    }
}
