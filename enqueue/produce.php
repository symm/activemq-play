<?php

require_once __DIR__  . '/vendor/autoload.php';

use Enqueue\Stomp\StompConnectionFactory;

// connect to stomp broker at example.com port 1000 using
$factory = new StompConnectionFactory([
    'host' => 'localhost',
    'port' => 61613,
    //'login' => 'theLogin',
]);

$psrContext = $factory->createContext();
$producer = $psrContext->createProducer();

$i = 1;
while(true) {
    $producer->send(
        $psrContext->createTopic('/topic/VirtualTopic.Orders'),
        $psrContext->createMessage(\json_encode(['hi' => 'there', 'index' => $i]))
    );

    $i++;
    print '.';
    sleep(1);
}


