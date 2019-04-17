<?php

namespace XIVAPI;

use GuzzleHttp\Psr7\Response;
use XIVAPI\Api\Character;
use XIVAPI\Api\FreeCompany;
use XIVAPI\Api\Linkshell;
use XIVAPI\Api\Lodestone;
use XIVAPI\Api\Market;
use XIVAPI\Api\PatchList;
use XIVAPI\Api\PrivateApi;
use XIVAPI\Api\PvPTeam;
use XIVAPI\Api\Search;
use XIVAPI\Api\Content;
use XIVAPI\Api\Url;
use XIVAPI\Common\Environment;
use XIVAPI\Guzzle\Guzzle;

class XIVAPI
{
    const PROD    = 'https://xivapi.com';
    const STAGING = 'https://staging.xivapi.com';
    const DEV     = 'http://xivapi.local';
    
    /** @var Environment */
    public $environment;
    /** @var Url */
    public $url;
    /** @var Search */
    public $search;
    /** @var Content */
    public $content;
    /** @var Character */
    public $character;
    /** @var FreeCompany */
    public $freecompany;
    /** @var Linkshell */
    public $linkshell;
    /** @var PvPTeam */
    public $pvpteam;
    /** @var Lodestone */
    public $lodestone;
    /** @var Market */
    public $market;
    /** @var PatchList */
    public $patchlist;
    /** @var PrivateApi */
    public $_private;

    public function __construct(string $environment = self::PROD)
    {
        // set environment to use
        Guzzle::setEnvironment($environment);

        $this->environment  = new Environment();
        $this->url          = new Url();
        $this->search       = new Search();
        $this->content      = new Content();
        $this->character    = new Character();
        $this->freecompany  = new FreeCompany();
        $this->linkshell    = new Linkshell();
        $this->pvpteam      = new PvPTeam();
        $this->lodestone    = new Lodestone();
        $this->market       = new Market();
        $this->patchlist    = new PatchList();
        $this->_private     = new PrivateApi();
    }
    
    public function reset(): XIVAPI
    {
        Guzzle::resetQuery();
        return $this;
    }
    
    public function async(): XIVAPI
    {
        Guzzle::setAsync();
        return $this;
    }
    
    public function unwrap($results): \stdClass
    {
        $unwrapped = (Object)[];
        foreach ($results as $key => $response) {
            /** @var Response $response */
            $response = $response['value'] ?? false;
            
            if ($response) {
                $response = \GuzzleHttp\json_decode($response->getBody());
            }
            
            $unwrapped->{$key} = $response;
        }
        
        return $unwrapped;
    }

    public function queries($queries): XIVAPI
    {
        Guzzle::resetQuery();
        
        foreach ($queries as $query => $value) {
            Guzzle::setQuery($query, $value);
        }

        return $this;
    }
}
