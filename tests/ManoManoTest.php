<?php
declare(strict_types=1);

namespace ExewenTest\ManoMano;

use Exewen\ManoMano\ManoManoFacade;

class ManoManoTest extends Base
{

    /**
     * 测试订单信息
     * @return void
     */
    public function testOrders()
    {
        $params   = [
            'seller_contract_id'      => $this->sellerContractId,
            'page'                    => 1,
            'limit'                   => 2,
            'status_updated_at_start' => '2024-07-01T00:00:00Z',
            'status_updated_at_end'   => '2024-07-07T00:00:00Z',
        ];
        $response = ManoManoFacade::getOrders($params);
        var_dump($response);
        $result = $response['pagination'] ?? [];
        $this->assertNotEmpty($result);
    }


}