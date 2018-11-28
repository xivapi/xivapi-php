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

    public function query($method, $apiEndpoint, $options = [])
    {
        if ($key = getenv(Environment::XIVAPI_KEY)) {
            $options[RequestOptions::QUERY]['key'] = $key;
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

    public function get($apiEndpoint, $options = [])
    {
        return $this->query('GET', $apiEndpoint, $options);
    }

    public function post($apiEndpoint, $options = [])
    {
        return $this->query('POST', $apiEndpoint, $options);
    }

    public function put($apiEndpoint, $options = [])
    {
        return $this->query('PUT', $apiEndpoint, $options);
    }

    public function delete($apiEndpoint, $options = [])
    {
        return $this->query('DELETE', $apiEndpoint, $options);
    }
}
