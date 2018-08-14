<?php

namespace XIVAPI\Services;

use XIVAPI\Guzzle\Guzzle;

class ServiceHandler
{
    protected $guzzle;

    public function __construct()
    {
        $this->guzzle = new Guzzle();
    }
}
