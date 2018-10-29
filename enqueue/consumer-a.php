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

$fooQueue = $psrContext->createQueue('Consumer.A.VirtualTopic.Orders');
$consumer = $psrContext->createConsumer($fooQueue);

while (true) {
    $message = $consumer->receive();

    echo($message->getBody() . PHP_EOL);
// process a message

    $consumer->acknowledge($message);
// $consumer->reject($message);
}
