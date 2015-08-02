<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace WebShopApps\MatrixRate\Test\Unit\Model\Config\Source;

class MatrixrateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \WebShopApps\MatrixRate\Model\Config\Source\Matrixrate
     */
    protected $model;

    /**
     * @var \WebShopApps\MatrixRate\Model\Carrier\Matrixrate|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $carrierMatrixrateMock;

    protected function setUp()
    {
        $this->carrierMatrixrateMock = $this->getMockBuilder('\WebShopApps\MatrixRate\Model\Carrier\Matrixrate')
            ->disableOriginalConstructor()
            ->setMethods(['getCode'])
            ->getMock();

        $helper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->model = $helper->getObject('WebShopApps\MatrixRate\Model\Config\Source\Matrixrate', [
            'carrierMatrixrate' => $this->carrierMatrixrateMock
        ]);
    }

    public function testToOptionArray()
    {
        $codes = [1, 2, 3, 4, 5];
        $expected = [];
        foreach ($codes as $k => $v) {
            $expected[] = ['value' => $k, 'label' => $v];
        }

        $this->carrierMatrixrateMock->expects($this->once())
            ->method('getCode')
            ->willReturn($codes);

        $this->assertEquals($expected, $this->model->toOptionArray());
    }
}
