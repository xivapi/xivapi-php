<?php

namespace XIVAPI;

use XIVAPI\Api\Search;
use XIVAPI\Api\Content;
use XIVAPI\Common\Environment;
use XIVAPI\Guzzle\Guzzle;

class XIVAPI
{
    /** @var Environment */
    public $environment;
    /** @var Search */
    public $search;
    /** @var Content */
    public $content;

    public function __construct()
    {
        $this->environment  = new Environment();
        $this->search       = new Search();
        $this->content      = new Content();
    }

    public function columns($columns): XIVAPI
    {
        Guzzle::setColumns($columns);
        return $this;
    }

    public function language($language): XIVAPI
    {
        Guzzle::setLanguage($language);
        return $this;
    }

    public function snakeCase(): XIVAPI
    {
        Guzzle::setSnakeCase();
        return $this;
    }

    public function tags($tags): XIVAPI
    {
        Guzzle::setTags($tags);
        return $this;
    }
}
