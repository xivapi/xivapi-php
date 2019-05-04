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
                'access'  => $accessKey,
                'item_id' => $itemId,
                'server'  => $server,
            ]
        ]);
    }
    
    /**
     * Request an item to be updated
     */
    public function manualItemUpdateForce(string $accessKey, int $itemId, string $server)
    {
        return Guzzle::get("/private/market/item/update/requested", [
            RequestOptions::QUERY => [
                'access'  => $accessKey,
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
                'access'  => $accessKey,
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
                'access'  => $accessKey,
                'item_id' => $itemId,
                'server'  => $server,
            ]
        ]);
    }
}
