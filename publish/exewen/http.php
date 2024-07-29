<?php

declare(strict_types=1);

use Exewen\Http\Middleware\LogMiddleware;
use Exewen\ManoMano\Middleware\AuthMiddleware;

return [
    'channels' => [
        'manomano_api' => [
            'verify'          => false,
            'ssl'             => true,
            'host'            => 'partnersapi.manomano.com',
            'port'            => null,
            'prefix'          => null,
            'connect_timeout' => 3,
            'timeout'         => 20,
            'handler'         => [
                AuthMiddleware::class,
                LogMiddleware::class,
            ],
            'extra'           => [
                'x-api-key' => null,
            ],
            'proxy'           => [
                'switch' => false,
                'http'   => '127.0.0.1:8888',
                'https'  => '127.0.0.1:8888'
            ]
        ],
    ]

];