<?php

namespace XIVAPI\Guzzle;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use XIVAPI\Common\Environment;

class Guzzle
{
    const ENDPOINT_PROD = 'https://xivapi.com';
    const ENDPOINT_DEV  = 'https://xivapi.local';
    const TIMEOUT = 10.0;
    const VERIFY = false;

    private static $columns = [];
    private static $language = null;
    private static $snakeCase = false;
    private static $tags = [];

    public static function query($method, $apiEndpoint, $options = [])
    {
        if ($key = getenv(Environment::XIVAPI_KEY)) {
            $options[RequestOptions::QUERY]['key'] = $key;
        }

        if (self::$columns) {
            $options[RequestOptions::QUERY]['columns'] = implode(',', self::$columns);
        }

        if (self::$language) {
            $options[RequestOptions::QUERY]['language'] = self::$language;
        }

        if (self::$snakeCase) {
            $options[RequestOptions::QUERY]['snake_case'] = 1;
        }

        if (self::$tags) {
            $options[RequestOptions::QUERY]['tags'] = implode(',', self::$tags);
        }

        $client = new Client([
            'base_uri'  => self::ENDPOINT_PROD,
            'timeout'   => self::TIMEOUT,
            'verify'    => self::VERIFY,
        ]);

        try {
            return \GuzzleHttp\json_decode(
                $client->request($method, $apiEndpoint, $options)->getBody()
            );
        } catch (ClientException $ex) {
            // todo - handle exception
            $response = $ex->getResponse();
        }
    }

    public static function setColumns($columns)
    {
        self::$columns = $columns;
    }

    public static function setLanguage($language)
    {
        self::$language = $language;
    }

    public static function setSnakeCase()
    {
        self::$snakeCase = true;
    }

    public static function setTags($tags)
    {
        self::$tags = $tags;
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
