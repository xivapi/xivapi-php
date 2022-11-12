<?php

namespace XIVAPI\Api;

use XIVAPI\Guzzle\Guzzle;

class ContentHandler
{
    /** @var string */
    private $contentName;
    private $page = 1;
    private $limiti = 100;

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
        return Guzzle::get("/{$this->contentName}", [
            "query" => [
	        "page" => $this->page,
	        "limit" => $this->limit,
            ],
        ]);
    }

    public function setPage(int $page): ContentHandler
    {
        $this->page = $page;
        return $this;
    }

    public function setLimit(int $limit): ContentHandler
    {
        $this->limit = $limit;
        return $this;
    }

    public function next()
    {
        $this->setPage($this->page + 1);
        return $this->list();
    }

}
