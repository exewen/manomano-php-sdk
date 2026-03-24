<?php

declare(strict_types=1);

namespace Exewen\ManoMano;

use Exewen\ManoMano\Contract\ManoManoInterface;
use Exewen\ManoMano\Services\OrdersService;
use Exewen\ManoMano\Services\ShippingsService;
use Exewen\ManoMano\Services\OffersService;
use Exewen\Config\Contract\ConfigInterface;

class ManoMano implements ManoManoInterface
{
    private $config;
    private $ordersService;
    private $shippingsService;
    private $offersService;

    public function __construct(
        ConfigInterface  $config,
        OrdersService    $ordersService,
        ShippingsService $shippingsService,
        OffersService    $offersService
    )
    {
        $this->config         = $config;
        $this->ordersService  = $ordersService;
        $this->shippingsService  = $shippingsService;
        $this->offersService  = $offersService;
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


    public function setShipments(array $params, array $header = [])
    {
        return $this->shippingsService->setShipments($params, $header);
    }


    public function acceptOrders(array $params, array $header = [])
    {
        return $this->ordersService->acceptOrders($params, $header);
    }

    public function refuseOrders(array $params, array $header = [])
    {
        return $this->ordersService->refuseOrders($params, $header);
    }

    public function getOffersInfo(array $params, array $header = [])
    {
        return $this->offersService->getOffersInfo($params, $header);
    }

    public function createOrUpdateOffers(array $params, array $header = [])
    {
        return $this->offersService->createOrUpdateOffers($params, $header);
    }

    public function updateOffers(string $offerId, array $params, array $header = [])
    {
        return $this->offersService->updateOffers($offerId, $params, $header);
    }
}
