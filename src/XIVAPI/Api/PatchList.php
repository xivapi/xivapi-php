<?php

namespace XIVAPI\Api;

use XIVAPI\Guzzle\Guzzle;

class PatchList
{
    public function list()
    {
        return Guzzle::get("/patchlist");
    }
}
