<?php

namespace XIVAPI\Api;

use XIVAPI\Guzzle\Guzzle;

class Lodestone
{
    public function all()
    {
        return Guzzle::get("/lodestone");
    }

    public function news()
    {
        return Guzzle::get("/lodestone/news");
    }

    public function notices()
    {
        return Guzzle::get("/lodestone/notices");
    }

    public function maintenance()
    {
        return Guzzle::get("/lodestone/maintenance");
    }

    public function updates()
    {
        return Guzzle::get("/lodestone/updates");
    }

    public function status()
    {
        return Guzzle::get("/lodestone/status");
    }

    public function worldstatus()
    {
        return Guzzle::get("/lodestone/worldstatus");
    }

    public function devblogs()
    {
        return Guzzle::get("/lodestone/devblogs");
    }

    public function devposts()
    {
        return Guzzle::get("/lodestone/devposts");
    }

    public function feasts(int $season = 4)
    {
        return Guzzle::get("/lodestone/feasts");
    }

    public function deepdungeon()
    {
        return Guzzle::get("/lodestone/news");
    }

}
