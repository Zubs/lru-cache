<?php

require_once __DIR__ . '/../vendor/autoload.php';

$cache = new \App\LRUCache(2);
$cache->set('first_value', 600);
$cache->set('second', 400);
$cache->set('third', 300);
echo $cache->get('second') . PHP_EOL;
echo $cache->count();
