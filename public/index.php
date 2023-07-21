<?php

require_once __DIR__ . '/../vendor/autoload.php';

$cache = new \App\LRUCache(20);
$cache->set('name', 'Zubs');
$cache->set('age', 27);
$cache->set('gender', 'Gender of not');
echo $cache->get('age') . PHP_EOL;
echo $cache->count() . PHP_EOL;
$cache->remove('gender');
echo $cache->count() . PHP_EOL;
