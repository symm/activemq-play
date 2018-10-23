<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symm\Config;

$client = Config::getConnection('CHICKEN-PRODUCER');

while (true) {
    $message = \json_encode([
        'some' => 'data',
        'time' => \microtime(),
    ]);
    $synchronous = true;
    $header = [];

    $client->send(Config::QUEUE_NAME, $message, $header, $synchronous);
    //$stomp->send('another-queue', 'hi', $header, $synchronous);

    print '.';
}

