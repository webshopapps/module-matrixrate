<?php
/**
 * WebShopApps
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * WebShopApps MatrixRate
 *
 * @category WebShopApps
 * @package WebShopApps_MatrixRate
 * @copyright Copyright (c) 2014 Zowta LLC (http://www.WebShopApps.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @author WebShopApps Team sales@webshopapps.com
 *
 */
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
    protected $matrixrateFactory;

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
        $this->matrixrateFactory = $matrixrateFactory;
        parent::__construct($context, $registry, $config, $cacheTypeList, $resource, $resourceCollection, $data);
    }

    /**
     * @return \Magento\Framework\Model\AbstractModel|void
     */
    public function afterSave()
    {
        /** @var \WebShopApps\MatrixRate\Model\ResourceModel\Carrier\Matrixrate $matrixRate */
        $matrixRate = $this->matrixrateFactory->create();
        $matrixRate->uploadAndImport($this);
        return parent::afterSave();
    }
}
