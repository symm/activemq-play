<?php

require_once __DIR__ . '/vendor/autoload.php';

use Stomp\Client;

const TOPIC = 'VirtualTopic.badgers';

$stomp = new Client('tcp://localhost:61613');
$stomp->getConnection();
$stomp->setClientId('CHICKEN-PRODUCER');

while (true) {
    $stomp->send(TOPIC, \json_encode([
        'chicken' => '🐔',
        'unicorn' => '🦄',
    ]), [], null);
    print '.';
    sleep(0.5);
}

