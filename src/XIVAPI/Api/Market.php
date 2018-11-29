<?php

namespace XIVAPI\Api;

use GuzzleHttp\RequestOptions;
use XIVAPI\Guzzle\Guzzle;

class Market
{
    public function price(string $server, int $itemId)
    {
        return Guzzle::get("/market/{$server}/items/{$itemId}");
    }

    public function history(string $server, int $itemId)
    {
        return Guzzle::get("/market/{$server}/items/{$itemId}/history");
    }

    public function stock(string $server, int $categoryId)
    {
        return Guzzle::get("/market/{$server}/category/{$categoryId}");
    }

    public function categories()
    {
        return Guzzle::get("/market/categories");
    }

    public function tokens($password)
    {
        return Guzzle::get("/market/categories", [
            RequestOptions::QUERY => [
                'password' => $password
            ]
        ]);
    }
}
