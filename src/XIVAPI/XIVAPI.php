<?php

namespace XIVAPI;

use XIVAPI\Services\Content;

class XIVAPI
{
    public $content;

    public function __construct()
    {
        $this->content = new Content();
    }
}
