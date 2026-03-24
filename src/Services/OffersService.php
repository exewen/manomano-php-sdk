<?php

namespace Exewen\ManoMano\Services;

use Exewen\Config\Contract\ConfigInterface;
use Exewen\Http\Contract\HttpClientInterface;

class OffersService
{
    private $httpClient;
    private $driver;
    private $offersUrl = '/api/v1/offer-information/offers';
    private $updateOffersUrl = '/api/v1/offers';
    private $offerDetailUrl = '/api/v2/offer-information/offers';

    public function __construct(HttpClientInterface $httpClient, ConfigInterface $config)
    {
        $this->httpClient = $httpClient;
        $this->driver     = $config->get('manomano.channel_api');
    }

    /**
     * GET 获取报价列表
     * @param array $params
     * @param array $header
     * @return array
     */
    public function getOffersInfo(array $params, array $header)
    {
        $response = $this->httpClient->get($this->driver, $this->offersUrl, $params, $header);
        $result = $response->getBody()->getContents();
        return json_decode($result, true);
    }

    /**
     * PUT Create or Update Offers (创建或更新报价)
     * @param array $params
     * @param array $header
     * @return array
     */
    public function createOrUpdateOffers(array $params, array $header)
    {
        $response = $this->httpClient->put($this->driver, $this->updateOffersUrl, $params, $header, [], 'json');
        $result = $response->getBody()->getContents();
        return json_decode($result, true);
    }

    /**
     * PATCH update_offers (更新报价 - 库存和价格)
     * @param string $offerId
     * @param array $params
     * @param array $header
     * @return array
     */
    public function updateOffers(string $offerId, array $params, array $header)
    {
        $url = str_replace('{offerId}', $offerId, $this->offerDetailUrl);
        $response = $this->httpClient->patch($this->driver, $url, $params, $header, [], 'json');
        $result = $response->getBody()->getContents();
        return json_decode($result, true);
    }
}
