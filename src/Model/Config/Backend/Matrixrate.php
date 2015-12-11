<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace WebShopApps\MatrixRate\Model\Config\Backend;

use Magento\Framework\Model\AbstractModel;

/**
 * Backend model for shipping table rates CSV importing
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Matrixrate extends \Magento\Framework\App\Config\Value
{
    /**
     * @var \WebShopApps\MatrixRate\Model\ResourceModel\Carrier\MatrixrateFactory
     */
    protected $_matrixrateFactory;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $config
     * @param \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList
     * @param \WebShopApps\MatrixRate\Model\ResourceModel\Carrier\MatrixrateFactory $matrixrateFactory
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\Config\ScopeConfigInterface $config,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \WebShopApps\MatrixRate\Model\ResourceModel\Carrier\MatrixrateFactory $matrixrateFactory,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->_matrixrateFactory = $matrixrateFactory;
        parent::__construct($context, $registry, $config, $cacheTypeList, $resource, $resourceCollection, $data);
    }

    /**
     * @return \Magento\Framework\Model\AbstractModel|void
     */
    public function afterSave()
    {
        /** @var \WebShopApps\MatrixRate\Model\ResourceModel\Carrier\Matrixrate $matrixRate */
        $matrixRate = $this->_matrixrateFactory->create();
        $matrixRate->uploadAndImport($this);
    }
}
