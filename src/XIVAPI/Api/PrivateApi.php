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
    
    public function retainerItems(string $accessKey, string $retainerId)
    {
        return Guzzle::get("/market/retainer", [
            RequestOptions::QUERY => [
                'access'      => $accessKey,
                'retainer_id' => $retainerId,
            ]
        ]);
    }
    
    public function characterHistory(string $accessKey, string $lodestoneId)
    {
        return Guzzle::get("/market/character", [
            RequestOptions::QUERY => [
                'access'       => $accessKey,
                'lodestone_id' => $lodestoneId,
            ]
        ]);
    }
    
    public function signatureItems(string $accessKey, string $lodestoneId)
    {
        return Guzzle::get("/market/signature", [
            RequestOptions::QUERY => [
                'access'       => $accessKey,
                'lodestone_id' => $lodestoneId,
            ]
        ]);
    }
}
