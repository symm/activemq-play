<?php

require_once __DIR__ . '/vendor/autoload.php';

use Stomp\StatefulStomp;
use Symm\Config;

$client = Config::getConnection('CHICKEN-CONSUMER');

$stomp = new StatefulStomp($client);
// TODO: how to read virutal topic queue
$stomp->subscribe(Config::TOPIC_NAME);

while(true) {
    $message = $stomp->read();
    if ($message) {
        echo $message->body . PHP_EOL;
    }
}
