<?php

namespace Exewen\ManoMano\Services;

use Exewen\Config\Contract\ConfigInterface;
use Exewen\Http\Contract\HttpClientInterface;

class OrdersService
{
    private $httpClient;
    private $driver;
    private $ordersUrl = '/orders/v1/orders';
    private $acceptOrdersUrl = '/orders/v1/accept-orders';
    private $refuseOrdersUrl = '/orders/v1/refuse-orders';

    public function __construct(HttpClientInterface $httpClient, ConfigInterface $config)
    {
        $this->httpClient = $httpClient;
        $this->driver     = $config->get('manomano.channel_api');
    }

    public function getOrders(array $params, array $header)
    {
        $response = $this->httpClient->get($this->driver, $this->ordersUrl, $params, $header);
        $result = $response->getBody()->getContents();
        return json_decode($result, true);
    }

    public function acceptOrders(array $params, array $header)
    {
        $response = $this->httpClient->post($this->driver, $this->acceptOrdersUrl, $params, $header, [], 'json');
        $result = $response->getBody()->getContents();
        return json_decode($result, true);
    }

    public function refuseOrders(array $params, array $header)
    {
        $response = $this->httpClient->post($this->driver, $this->refuseOrdersUrl, $params, $header, [], 'json');
        $result = $response->getBody()->getContents();
        return json_decode($result, true);
    }


}