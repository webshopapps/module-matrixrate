<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace WebShopApps\MatrixRate\Test\Unit\Model\Carrier;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\DataObject;
use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory;
use Magento\Quote\Model\Quote\Address\RateResult\MethodFactory;
use Magento\Shipping\Model\Rate\Result;
use Magento\Shipping\Model\Rate\ResultFactory;
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use WebShopApps\MatrixRate\Model\Carrier\Matrixrate;
use WebShopApps\MatrixRate\Model\ResourceModel\Carrier\Matrixrate as MatrixrateResource;
use WebShopApps\MatrixRate\Model\ResourceModel\Carrier\MatrixrateFactory;

class MatrixrateTest extends TestCase
{
    /**
     * @var MatrixrateResource|Stub
     */
    private $resourceMock;

    /**
     * @var Matrixrate
     */
    private $model;

    protected function setUp(): void
    {
        $scopeConfig = $this->createStub(ScopeConfigInterface::class);
        $scopeConfig->method('isSetFlag')->willReturnMap([
            ['carriers/matrixrate/active', 'store', null, true],
            ['carriers/matrixrate/include_virtual_price', 'store', null, false],
        ]);
        $scopeConfig->method('getValue')->willReturn('package_value');

        $resultFactory = $this->createStub(ResultFactory::class);
        $resultFactory->method('create')->willReturn($this->createStub(Result::class));

        $this->resourceMock = $this->createStub(MatrixrateResource::class);
        $resourceFactory = $this->createStub(MatrixrateFactory::class);
        $resourceFactory->method('create')->willReturn($this->resourceMock);

        $this->model = new Matrixrate(
            $scopeConfig,
            $this->createStub(ErrorFactory::class),
            $this->createStub(LoggerInterface::class),
            $resultFactory,
            $this->createStub(MethodFactory::class),
            $resourceFactory
        );
    }

    public function testCollectRatesRestoresPackageValueAfterFreeShippingItemsAreExcluded(): void
    {
        $request = $this->createRequestWithFreeShippingItem(100.0, 30.0);

        $valueSeenByRateLookup = null;
        $this->resourceMock->method('getRate')->willReturnCallback(
            function (RateRequest $request) use (&$valueSeenByRateLookup) {
                $valueSeenByRateLookup = $request->getPackageValue();
                return [];
            }
        );

        $this->model->collectRates($request);

        $this->assertSame(70.0, $valueSeenByRateLookup);
        $this->assertSame(100.0, $request->getPackageValue());
    }

    public function testCollectRatesProducesSameLookupValueWhenCalledTwiceOnOneRequest(): void
    {
        $request = $this->createRequestWithFreeShippingItem(100.0, 30.0);

        $valuesSeenByRateLookup = [];
        $this->resourceMock->method('getRate')->willReturnCallback(
            function (RateRequest $request) use (&$valuesSeenByRateLookup) {
                $valuesSeenByRateLookup[] = $request->getPackageValue();
                return [];
            }
        );

        $this->model->collectRates($request);
        $this->model->collectRates($request);

        $this->assertSame([70.0, 70.0], $valuesSeenByRateLookup);
    }

    private function createRequestWithFreeShippingItem(float $packageValue, float $freeRowTotal): RateRequest
    {
        $product = new class extends DataObject {
            public function isVirtual(): bool
            {
                return false;
            }
        };
        $item = new DataObject([
            'product' => $product,
            'free_shipping' => 1,
            'qty' => 1,
            'base_row_total' => $freeRowTotal,
        ]);

        $request = new RateRequest();
        $request->setAllItems([$item]);
        $request->setPackageValue($packageValue);
        $request->setPackageQty(2);
        $request->setPackageWeight(5);
        $request->setFreeMethodWeight(0);

        return $request;
    }
}
