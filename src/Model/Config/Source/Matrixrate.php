<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace WebShopApps\MatrixRate\Model\Config\Source;

class Matrixrate implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var \WebShopApps\MatrixRate\Model\Carrier\Matrixrate
     */
    protected $_carrierMatrixrate;

    /**
     * @param \WebShopApps\MatrixRate\Model\Carrier\Matrixrate $carrierMatrixrate
     */
    public function __construct(\WebShopApps\MatrixRate\Model\Carrier\Matrixrate $carrierMatrixrate)
    {
        $this->_carrierMatrixrate = $carrierMatrixrate;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $arr = [];
        foreach ($this->_carrierMatrixrate->getCode('condition_name') as $k => $v) {
            $arr[] = ['value' => $k, 'label' => $v];
        }
        return $arr;
    }
}
