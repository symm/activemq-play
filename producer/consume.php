<?php

require_once __DIR__ . '/vendor/autoload.php';

use Stomp\Client;

const CLIENT_ID = 'chicken-consumer';
const QUEUE_NAME = 'Consumer.something.VirtualTopic.chickens';

$client = new Client('tcp://localhost:61613');
$client->getConnection();
$client->setClientId(CLIENT_ID);

$stomp = new \Stomp\StatefulStomp($client);


$stomp->subscribe(QUEUE_NAME);
while(true) {
    $message = $stomp->read();
    print $message;
}
