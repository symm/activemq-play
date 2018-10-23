<?php

require_once __DIR__ . '/vendor/autoload.php';

use Stomp\StatefulStomp;
use Symm\Config;

use Stomp\Client;

$client = new Client(Config::getConnectionString());
$client->getConnection();
$client->setLogin(Config::USERNAME, Config::PASSWORD);
$client->setClientId('CHICKEN-CONSUMER');

$stomp = new StatefulStomp($client);
$stomp->subscribe(Config::QUEUE_NAME);

while(true) {
    $message = $stomp->read();
    echo $message->body . PHP_EOL;
}
