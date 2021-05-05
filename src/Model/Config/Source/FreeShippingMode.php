<?php

namespace WebShopApps\MatrixRate\Model\Config\Source;

class FreeShippingMode implements \Magento\Framework\Data\OptionSourceInterface
{
    const MODE_ALL = 'all';
    const MODE_CHEAPEST = 'cheapest';

    public function toOptionArray()
    {
        return [
            [
                'value' => self::MODE_ALL,
                'label' => __('All'),
            ],
            [
                'value' => self::MODE_CHEAPEST,
                'label' => __('Cheapest only'),
            ]
        ];
    }
}
