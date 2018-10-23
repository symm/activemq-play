<?php

namespace Symm;

use Stomp\Client;

class Config
{
    public const USERNAME = 'admin';
    public const PASSWORD = 'admin';

    public const TOPIC_NAME = '/topic/VirtualTopic.Orders';

    public const QUEUE_NAME = '/queue/SomeQueue';

    public const PRIMARY_SERVER = 'tcp://localhost:61613';

    public const SERVERS = [
        'tcp://localhost:61613',
        //'tcp://localhost:61614',
    ];

    public static function getConnectionString(): string
    {
        $serverPool = '(' . implode(',', self::SERVERS) . ')';

        return 'failover://' . $serverPool . '?randomize=false';
    }

    public static function getConnection(?string $clientId): Client
    {
        $stomp = new Client(self::getConnectionString());
        $stomp->setLogin(self::USERNAME, self::PASSWORD);
        $stomp->setClientId($clientId);

        return $stomp;
    }
}