<?php
declare(strict_types=1);

namespace ExewenTest\ManoMano;

use Exewen\ManoMano\Contract\ManoManoInterface;
use Exewen\Di\Container;
use Exewen\Http\HttpProvider;
use Exewen\Logger\LoggerProvider;
use Exewen\ManoMano\ManoManoProvider;
use PHPUnit\Framework\TestCase;

class Base extends TestCase
{
    protected $app;

    /**
     * @var ManoManoInterface
     */
    protected $manoMano;

    /**
     * @var array|false|string
     */
    protected $sellerContractId;

    public function __construct()
    {
        parent::__construct();
        !defined('BASE_PATH_PKG') && define('BASE_PATH_PKG', dirname(__DIR__, 1));

        $app = new Container();
        $app->setProviders([
            LoggerProvider::class,
            HttpProvider::class,
            ManoManoProvider::class,
        ]);
        $this->app = $app;

        /** @var ManoManoInterface $manoMano */
        $manoMano       = $this->app->get(ManoManoInterface::class);
        $this->manoMano = $manoMano;

        $this->manoMano->setApiKey(getenv('MANO_API_KEY'));
        $this->sellerContractId = getenv('SELLER_CONTRACT_ID');
//        $this->manoMano->setThirdPartyName(getenv('MANO_THIRD_PARTY_NAME'));
    }

}