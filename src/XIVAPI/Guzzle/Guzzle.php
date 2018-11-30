<?php

namespace XIVAPI\Guzzle;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use XIVAPI\Common\Environment;

class Guzzle
{
    const ENDPOINT_PROD = 'https://xivapi.com';
    const ENDPOINT_DEV  = 'https://xivapi.local';
    const TIMEOUT = 10.0;
    const VERIFY = false;

    private static $options = [];

    public static function query($method, $apiEndpoint, $options = [])
    {
        if ($key = getenv(Environment::XIVAPI_KEY)) {
            $options[RequestOptions::QUERY]['key'] = $key;
        }

        foreach (self::$options as $query => $value) {
            $value = is_array($value) ? implode(',', $value) : $value;
            $options[RequestOptions::QUERY][$query] = $value;
        }

        $client = new Client([
            'base_uri'  => self::ENDPOINT_PROD,
            'timeout'   => self::TIMEOUT,
            'verify'    => self::VERIFY,
        ]);

        return \GuzzleHttp\json_decode(
            $client->request($method, $apiEndpoint, $options)->getBody()
        );
    }

    public static function setQuery(string $query, $value)
    {
        self::$options[$query] = $value;
    }

    public static function get($apiEndpoint, $options = [])
    {
        return self::query('GET', $apiEndpoint, $options);
    }

    public static function post($apiEndpoint, $options = [])
    {
        return self::query('POST', $apiEndpoint, $options);
    }

    public static function put($apiEndpoint, $options = [])
    {
        return self::query('PUT', $apiEndpoint, $options);
    }

    public static function delete($apiEndpoint, $options = [])
    {
        return self::query('DELETE', $apiEndpoint, $options);
    }
}
