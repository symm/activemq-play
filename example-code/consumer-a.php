<?php

require_once __DIR__ . '/vendor/autoload.php';

use Stomp\StatefulStomp;
use Symm\Config;

$client = Config::getConnection('CHICKEN-CONSUMER-1');

$stomp = new StatefulStomp($client);
$stomp->subscribe('Consumer.A.VirtualTopic.Orders');

while(true) {
    $message = $stomp->read();
    if ($message) {
        echo $message->body . PHP_EOL;
    }
}
