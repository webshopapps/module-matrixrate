<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace WebShopApps\MatrixRate\Test\Unit\Model\Config\Backend;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;

class MatrixrateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \WebShopApps\MatrixRate\Model\Config\Backend\Matrixrate
     */
    protected $model;

    /**
     * @var \WebShopApps\MatrixRate\Model\ResourceModel\Carrier\MatrixrateFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $tableateFactoryMock;

    /** @var ObjectManagerHelper */
    protected $objectManagerHelper;

    protected function setUp()
    {
        $this->objectManagerHelper = new ObjectManagerHelper($this);

        $this->tableateFactoryMock =
            $this->getMockBuilder('WebShopApps\MatrixRate\Model\ResourceModel\Carrier\MatrixrateFactory')
            ->disableOriginalConstructor()
            ->setMethods(['create'])
            ->getMock();

        $this->model = $this->objectManagerHelper->getObject('\WebShopApps\MatrixRate\Model\Config\Backend\Matrixrate', [
            'matrixrateFactory' => $this->tableateFactoryMock
        ]);
    }

    public function testAfterSave()
    {
        $matrixrateMock = $this->getMockBuilder('WebShopApps\MatrixRate\Model\ResourceModel\Carrier\Matrixrate')
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
