<?php
declare(strict_types=1);

namespace ExewenTest\ManoMano;

use Exewen\ManoMano\ManoManoFacade;
use PHPUnit\Framework\TestCase;

class Base extends TestCase
{

    /**
     * @var array|false|string
     */
    protected $sellerContractId;

    public function __construct()
    {
        parent::__construct();
        !defined('BASE_PATH_PKG') && define('BASE_PATH_PKG', dirname(__DIR__, 1));

        ManoManoFacade::setApiKey(getenv('MANO_API_KEY'));
        $this->sellerContractId = getenv('SELLER_CONTRACT_ID');
    }

}