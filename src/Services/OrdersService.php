<?php

namespace Exewen\ManoMano\Services;

use Exewen\Config\Contract\ConfigInterface;
use Exewen\Http\Contract\HttpClientInterface;

class OrdersService
{
    private $httpClient;
    private $driver;
    private $ordersUrl = '/orders/v1/orders';

    public function __construct(HttpClientInterface $httpClient, ConfigInterface $config)
    {
        $this->httpClient = $httpClient;
        $this->driver     = $config->get('manomano.channel_api');
    }

    public function getOrders(array $params, array $header)
    {
        $result = $this->httpClient->get($this->driver, $this->ordersUrl, $params, $header);
        return json_decode($result, true);
    }


}