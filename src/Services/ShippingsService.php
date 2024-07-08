<?php

namespace Exewen\ManoMano\Services;

use Exewen\Config\Contract\ConfigInterface;
use Exewen\Http\Contract\HttpClientInterface;

class ShippingsService
{
    private $httpClient;
    private $driver;
    private $setShipmentsUrl = '/orders/v1/shippings';

    public function __construct(HttpClientInterface $httpClient, ConfigInterface $config)
    {
        $this->httpClient = $httpClient;
        $this->driver     = $config->get('manomano.channel_api');
    }


    public function setShipments(string $orderId, array $params, array $header)
    {
        $result = $this->httpClient->post($this->driver, $this->setShipmentsUrl, $params, $header, [], 'json');
        return json_decode($result, true);
    }

}