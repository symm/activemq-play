<?php

require_once __DIR__  . '/vendor/autoload.php';

use Enqueue\AmqpLib\AmqpConnectionFactory;

$factory = new AmqpConnectionFactory('amqp://admin:admin@localhost:5672/%2f');

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


