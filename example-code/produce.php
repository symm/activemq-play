<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symm\Config;

$client = Config::getConnection('CHICKEN-PRODUCER');

$i = 0;
while (true) {
    $message = \json_encode([
        'message' => 'Release the hounds!',
        'index' => $i,
    ]);
    $synchronous = true;
    $header = [];

    $client->send(Config::TOPIC_NAME, $message, $header, $synchronous);
    //sleep(1);
    print '.';
    $i++;
    sleep(1);
}

