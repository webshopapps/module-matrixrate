<?php
/**
 * @copyright Copyright (c) 2014 Zowta Ltd, Zowta LLC (http://www.WebShopApps.com)
 */
namespace Webshopapps\Matrixrate\Model\Config\Backend;

use Magento\Framework\Model\AbstractModel;

/**
 * Backend model for shipping table rates CSV importing
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Matrixrate extends \Magento\Framework\App\Config\Value
{
    /**
     * @var \Webshopapps\Matrixrate\Model\Resource\Carrier\MatrixrateFactory
     */
    protected $_matrixrateFactory;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $config
     * @param \Webshopapps\Matrixrate\Model\Resource\Carrier\MatrixrateFactory $matrixrateFactory
     * @param \Magento\Framework\Model\Resource\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\Db $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\Config\ScopeConfigInterface $config,
        \Webshopapps\Matrixrate\Model\Resource\Carrier\MatrixrateFactory $matrixrateFactory,
        \Magento\Framework\Model\Resource\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\Db $resourceCollection = null,
        array $data = []
    ) {
        $this->_matrixrateFactory = $matrixrateFactory;
        parent::__construct($context, $registry, $config, $resource, $resourceCollection, $data);
    }

    /**
     * @return \Magento\Framework\Model\AbstractModel|void
     */
    public function afterSave()
    {
        $this->_matrixrateFactory->create()->uploadAndImport($this);
    }
}
