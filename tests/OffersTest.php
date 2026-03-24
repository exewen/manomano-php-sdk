<?php
declare(strict_types=1);

namespace ExewenTest\ManoMano;

use Exewen\ManoMano\ManoManoFacade;

/**
 * Manomano Offers API 测试类
 */
class OffersTest extends Base
{
    /**
     * 测试 GET get_offers_info 获取报价列表
     * @return void
     */
    public function testGetOffersInfo()
    {
        $params = [
            'seller_contract_id' => $this->sellerContractId,
            'page'               => 1,
            'limit'              => 10,
        ];
        
        $response = ManoManoFacade::getOffersInfo($params);
        var_dump($response);
        $this->assertIsArray($response);
    }

    /**
     * 测试 PUT Create or Update Offers 创建或更新报价
     * @return void
     */
    public function testCreateOrUpdateOffers()
    {
        // 创建或更新报价数据
        $data = [
            'offers' => [
                [
                    'sku'      => 'TEST-SKU-001',
                    'price'    => [
                        'amount'   => 19.99,
                        'currency' => 'EUR',
                    ],
                    'stock'    => 100,
                    'state'    => 'active',
                ],
            ]
        ];
        
        $response = ManoManoFacade::createOrUpdateOffers($data);
        var_dump($response);
        $this->assertIsArray($response);
    }

    /**
     * 测试 PATCH update_offers 更新报价
     * @return void
     */
    public function testUpdateOffers()
    {
        // 先获取一个 offer ID
        $listParams = [
            'seller_contract_id' => $this->sellerContractId,
            'page'               => 1,
            'limit'              => 1,
        ];
        
        $listResult = ManoManoFacade::getOffersInfo($listParams);
        
        if (isset($listResult['offers'][0]['offer_id'])) {
            $offerId = $listResult['offers'][0]['offer_id'];
            
            // 更新价格和库存
            $data = [
                'price' => [
                    'amount'   => 19.99,
                    'currency' => 'EUR',
                ],
                'stock' => 50,
            ];
            
            $response = ManoManoFacade::updateOffers($offerId, $data);
            var_dump($response);
            $this->assertIsArray($response);
        } else {
            $this->markTestSkipped('没有可用的报价数据');
        }
    }
}
