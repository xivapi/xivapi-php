<?php

namespace XIVAPI\Api;

use GuzzleHttp\RequestOptions;
use XIVAPI\Guzzle\Guzzle;

/**
 * Provides more free/open queries of custom endpoints
 */
class Url
{
    public function get(string $endpoint, array $options)
    {
        return Guzzle::get($endpoint, [
            RequestOptions::QUERY => $options
        ]);
    }

    public function post(string $endpoint, array $options)
    {
        return Guzzle::post($endpoint, [
            RequestOptions::QUERY => $options
        ]);
    }
}
