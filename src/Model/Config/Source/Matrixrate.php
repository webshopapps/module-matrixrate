<?php
/**
 * @copyright Copyright (c) 2014 Zowta Ltd, Zowta LLC (http://www.WebShopApps.com)
 */
namespace Webshopapps\Matrixrate\Model\Config\Source;

class Matrixrate implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var \Webshopapps\Matrixrate\Model\Carrier\Matrixrate
     */
    protected $_carrierMatrixrate;

    /**
     * @param \Webshopapps\Matrixrate\Model\Carrier\Matrixrate $carrierMatrixrate
     */
    public function __construct(\Webshopapps\Matrixrate\Model\Carrier\Matrixrate $carrierMatrixrate)
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
