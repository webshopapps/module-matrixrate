<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace WebShopApps\MatrixRate\Test\Unit\Model\Plugin\Checkout\Block\Cart;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;

class ShippingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \WebShopApps\MatrixRate\Model\Plugin\Checkout\Block\Cart\Shipping
     */
    protected $model;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $scopeConfigMock;

    protected function setUp()
    {
        $this->objectManagerHelper = new ObjectManagerHelper($this);

        $this->scopeConfigMock = $this->getMockBuilder('\Magento\Framework\App\Config\ScopeConfigInterface')
            ->disableOriginalConstructor()
            ->setMethods([
                'getValue',
                'isSetFlag'
            ])
            ->getMock();

        $this->model = $this->objectManagerHelper->getObject('\WebShopApps\MatrixRate\Model\Plugin\Checkout\Block\Cart\Shipping', [
            'scopeConfig' => $this->scopeConfigMock
        ]);
    }

    /**
     * @dataProvider afterGetStateActiveDataProvider
     */
    public function testAfterGetStateActive($scopeConfigMockReturnValue, $result, $assertResult)
    {
        /** @var \Magento\Checkout\Block\Cart\Shipping $subjectMock */
        $subjectMock = $this->getMockBuilder('Magento\Checkout\Block\Cart\Shipping')
            ->disableOriginalConstructor()
            ->getMock();

        $this->scopeConfigMock->expects($result ? $this->never() : $this->once())
            ->method('getValue')
            ->willReturn($scopeConfigMockReturnValue);

        $this->assertEquals($assertResult, $this->model->afterGetStateActive($subjectMock, $result));
    }

    public function afterGetStateActiveDataProvider()
    {
        return [
            [
                true,
                true,
                true
            ],
            [
                true,
                false,
                true
            ],
            [
                false,
                false,
                false
            ]
        ];
    }
}
