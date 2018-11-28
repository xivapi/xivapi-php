<?php

namespace XIVAPI;

use XIVAPI\Api\Search;
use XIVAPI\Common\Environment;

class XIVAPI
{
    /** @var Environment */
    public $environment;
    /** @var Search */
    public $search;

    public function __construct()
    {
        $this->environment = new Environment();
        $this->search = new Search();
    }
}
