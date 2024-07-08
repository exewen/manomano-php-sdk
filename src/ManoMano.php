<?php

declare(strict_types=1);

namespace Exewen\ManoMano;

use Exewen\ManoMano\Contract\ManoManoInterface;
use Exewen\ManoMano\Services\OrdersService;
use Exewen\ManoMano\Services\ShippingsService;
use Exewen\Config\Contract\ConfigInterface;

class ManoMano implements ManoManoInterface
{
    private $config;
    private $ordersService;
    private $shippingsService;

    public function __construct(
        ConfigInterface  $config,
        OrdersService    $ordersService,
        ShippingsService $shippingsService
    )
    {
        $this->config         = $config;
        $this->ordersService  = $ordersService;
        $this->shippingsService  = $shippingsService;
    }

    public function setApiKey(string $apiKey, string $channel = 'manomano_api')
    {
        $this->config->set('http.channels.' . $channel . '.extra.api_key', $apiKey);
    }

    public function setThirdPartyName(string $thirdPartyName, string $channel = 'cdiscount_api')
    {
        $this->config->set('http.channels.' . $channel . '.extra.third_party_name', $thirdPartyName);
    }


    public function getOrders(array $params, array $header = [])
    {
        return $this->ordersService->getOrders($params, $header);
    }


    public function setShipments(string $orderId, array $params, array $header = [])
    {
        return $this->shippingsService->setShipments($orderId, $params, $header);
    }


}
