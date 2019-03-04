<?php

namespace XIVAPI\Api;

use GuzzleHttp\RequestOptions;
use XIVAPI\Guzzle\Guzzle;

class Market
{
    public function getServer(string $server, int $itemId)
    {
        return Guzzle::get("/market/{$server}/item/{$itemId}");
    }
    
    public function getServers(array $servers, int $itemId)
    {
        return Guzzle::get("/market/item/{$itemId}", [
            RequestOptions::QUERY => [
                'servers' => implode(',', $servers)
            ]
        ]);
    }
    
    public function getDataCenter(string $dc, int $itemId)
    {
        return Guzzle::get("/market/item/{$itemId}", [
            RequestOptions::QUERY => [
                'dc' => $dc
            ]
        ]);
    }

    public function categories()
    {
        return Guzzle::get("/market/categories");
    }
}
