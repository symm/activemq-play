<?php

require_once __DIR__ . '/vendor/autoload.php';

use Stomp\StatefulStomp;
use Symm\Config;

use Stomp\Client;

$client = new Client(Config::PRIMARY_SERVER);
$client->getConnection();
$client->setClientId('CHICKEN-CONSUMER');

$stomp = new StatefulStomp($client);
$stomp->subscribe(Config::QUEUE_NAME);

while(true) {
    $message = $stomp->read();
    print $message;
}
