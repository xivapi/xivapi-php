<?php

require __DIR__.'/vendor/autoload.php';

$api = new \XIVAPI\XIVAPI();
$data = $api->content->all();
print_r($data);
