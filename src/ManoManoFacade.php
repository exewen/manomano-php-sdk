<?php
declare(strict_types=1);

namespace Exewen\ManoMano;

use Exewen\Facades\Facade;
use Exewen\Http\HttpProvider;
use Exewen\Logger\LoggerProvider;
use Exewen\ManoMano\Contract\ManoManoInterface;

/**
 * @method static void setApiKey(string $apiKey, string $channel = 'manomano_api')
 * @method static void setThirdPartyName(string $thirdPartyName, string $channel = 'cdiscount_api')
 * @method static array getOrders(array $params, array $header = [])
 * @method static array setShipments(array $params, array $header = [])
 * @method static array acceptOrders(array $params, array $header = [])
 * @method static array refuseOrders(array $params, array $header = [])
 * @method static array getOffers(array $params, array $header = [])
 * @method static array getOffer(string $offerId, array $params = [], array $header = [])
 * @method static array updateOffer(string $offerId, array $params, array $header = [])
 * @method static array batchUpdateOffers(array $params, array $header = [])
 */
class ManoManoFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return ManoManoInterface::class;
    }

    public static function getProviders(): array
    {
        return [
            LoggerProvider::class,
            HttpProvider::class,
            ManoManoProvider::class
        ];
    }
}