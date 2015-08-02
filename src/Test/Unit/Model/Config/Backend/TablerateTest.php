<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace WebShopApps\MatrixRate\Test\Unit\Model\Config\Backend;

class MatrixrateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \WebShopApps\MatrixRate\Model\Config\Backend\Matrixrate
     */
    protected $model;

    /**
     * @var \WebShopApps\MatrixRate\Model\Resource\Carrier\MatrixrateFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $tableateFactoryMock;

    protected function setUp()
    {
        $this->tableateFactoryMock =
            $this->getMockBuilder('WebShopApps\MatrixRate\Model\Resource\Carrier\MatrixrateFactory')
            ->disableOriginalConstructor()
            ->setMethods(['create'])
            ->getMock();

        $helper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->model = $helper->getObject('\WebShopApps\MatrixRate\Model\Config\Backend\Matrixrate', [
            'matrixrateFactory' => $this->tableateFactoryMock
        ]);
    }

    public function testAfterSave()
    {
        $matrixrateMock = $this->getMockBuilder('WebShopApps\MatrixRate\Model\Resource\Carrier\Matrixrate')
            ->disableOriginalConstructor()
            ->setMethods(['uploadAndImport'])
            ->getMock();

        $this->tableateFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($matrixrateMock);

        $matrixrateMock->expects($this->once())
            ->method('uploadAndImport')
            ->with($this->model);

        $this->model->afterSave();
    }
}
