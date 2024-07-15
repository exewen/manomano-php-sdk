<?php
declare(strict_types=1);

namespace Exewen\ManoMano\Contract;


interface ManoManoInterface
{
    public function setApiKey(string $apiKey, string $channel = 'cdiscount_api');

    public function setThirdPartyName(string $thirdPartyName, string $channel = 'cdiscount_api');

    public function getOrders(array $params, array $header = []);

    public function setShipments(array $params, array $header = []);

}