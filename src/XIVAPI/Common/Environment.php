<?php

namespace XIVAPI\Common;

/**
 * Set environment variables
 */
class Environment
{
    const XIVAPI_KEY = 'XIVAPI_KEY';

    public function key(string $key):  Environment
    {
        putenv(self::XIVAPI_KEY .'='. $key);
        return $this;
    }
}
