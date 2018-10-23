<?php

namespace Symm;

class Config
{
    const QUEUE_NAME = 'Consumer.something.VirtualTopic.chickens';

    const PRIMARY_SERVER = 'tcp://localhost:61613';

    const SERVERS = [
        'tcp://localhost:61613',
        //'tcp://localhost:61614',
    ];

    public static function getConnectionString()
    {
        $bits = '(' . implode(',', self::SERVERS) . ')';

        return 'failover://' . $bits . '?randomize=false';
    }
}