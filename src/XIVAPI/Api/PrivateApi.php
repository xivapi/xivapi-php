<?php

namespace XIVAPI\Api;

use GuzzleHttp\RequestOptions;
use XIVAPI\Guzzle\Guzzle;

class PrivateApi
{
    /**
     * Request an item to be updated
     */
    public function manualItemUpdate(string $accessKey, int $itemId, string $server)
    {
        return Guzzle::get("/private/market/item/update", [
            RequestOptions::QUERY => [
                'companion_access_key' => $accessKey,
                'item_id' => $itemId,
                'server'  => $server,
            ]
        ]);
    }
    
    /**
     * Request an item to be updated
     */
    public function itemPrices(string $accessKey, int $itemId, string $server)
    {
        return Guzzle::get("/private/market/item", [
            RequestOptions::QUERY => [
                'companion_access_key' => $accessKey,
                'item_id' => $itemId,
                'server'  => $server,
            ]
        ]);
    }
    
    /**
     * Request an item to be updated
     */
    public function itemHistory(string $accessKey, int $itemId, string $server)
    {
        return Guzzle::get("/private/market/item/history", [
            RequestOptions::QUERY => [
                'companion_access_key' => $accessKey,
                'item_id' => $itemId,
                'server'  => $server,
            ]
        ]);
    }
}
