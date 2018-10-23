<?php

require_once __DIR__ . '/vendor/autoload.php';

use Stomp\Client;
use Symm\Config;

$stomp = new Client(Config::getConnectionString());
$stomp->setLogin(Config::USERNAME, Config::PASSWORD);
$stomp->setClientId('CHICKEN-PRODUCER');

while (true) {
    $message = \json_encode([
            'chicken' => '🐔',
            'unicorn' => '🦄',
    ]);
    $synchronous = true;
    $header = [];

    $stomp->send(Config::QUEUE_NAME, $message, $header, $synchronous);
    print '.';
}

