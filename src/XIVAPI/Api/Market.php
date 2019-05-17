<?php

namespace XIVAPI\Api;

use GuzzleHttp\RequestOptions;
use XIVAPI\Guzzle\Guzzle;

class Market
{
    public function item(int $itemId, array $servers = [], string $dc = '')
    {
        if (empty($servers) && empty($dc)) {
            throw new \Exception('You must provide either a list of servers or a DC name');
        }

        $options = [];

        if ($servers) {
            $options['servers'] = implode(',', $servers);
        }

        if ($dc) {
            $options['dc'] = $dc;
        }
        
        return Guzzle::get("/market/item/{$itemId}", [
            RequestOptions::QUERY => $options
        ]);
    }

    public function items(array $itemIds, array $servers, string $dc = '')
    {
        if (empty($itemIds)) {
            throw new \Exception('You must provide a list of item ids');
        }

        if (empty($servers) && empty($dc)) {
            throw new \Exception('You must provide either a list of servers or a DC name');
        }

        $options = [];

        $options['ids'] = implode(',', $itemIds);

        if ($servers) {
            $options['servers'] = implode(',', $servers);
        }

        if ($dc) {
            $options['dc'] = $dc;
        }

        return Guzzle::get("/market/items", [
            RequestOptions::QUERY => $options
        ]);
    }

    public function search($elasticQuery)
    {
        return Guzzle::get("/market/search", [
            RequestOptions::JSON => $elasticQuery
        ]);
    }

    public function ids()
    {
        return Guzzle::get("/market/ids");
    }

    public function categories()
    {
        return Guzzle::get("/market/categories");
    }
    
    public function stats()
    {
        return Guzzle::get("/market/stats");
    }
    
    public function online()
    {
        return Guzzle::get("/market/online");
    }
}
