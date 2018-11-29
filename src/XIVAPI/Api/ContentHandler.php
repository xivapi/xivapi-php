<?php

namespace XIVAPI\Api;

use XIVAPI\Guzzle\Guzzle;

class ContentHandler
{
    /** @var string */
    private $contentName;

    public function setContentName(string $name): ContentHandler
    {
        $this->contentName = ucfirst($name);
        return $this;
    }

    public function one($id)
    {
        return Guzzle::get("/{$this->contentName}/{$id}");
    }

    public function list()
    {
        return Guzzle::get("/{$this->contentName}");
    }
}
