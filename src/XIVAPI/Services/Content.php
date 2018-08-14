<?php

namespace XIVAPI\Services;

class Content extends ServiceHandler
{
    public function all(): array
    {
        return $this->guzzle->get('/content');
    }
}
