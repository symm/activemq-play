<?php

require_once __DIR__ . '/vendor/autoload.php';

use Stomp\StatefulStomp;
use Symm\Config;

$client = Config::getConnection('CHICKEN-CONSUMER-2');

$stomp = new StatefulStomp($client);
$stomp->subscribe('Consumer.B.VirtualTopic.Orders');

while(true) {
    $message = $stomp->read();
    if ($message) {
        echo $message->body . PHP_EOL;
    }
}
