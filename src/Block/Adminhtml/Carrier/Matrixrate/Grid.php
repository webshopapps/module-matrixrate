<?php
/**
 * @copyright Copyright (c) 2014 Zowta Ltd, Zowta LLC (http://www.WebShopApps.com)
 */
namespace Webshopapps\Matrixrate\Block\Adminhtml\Carrier\Matrixrate;

/**
 * Shipping carrier table rate grid block
 * WARNING: This grid used for export table rates
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * Website filter
     *
     * @var int
     */
    protected $_websiteId;

    /**
     * Condition filter
     *
     * @var string
     */
    protected $_conditionName;

    /**
     * @var \Webshopapps\Matrixrate\Model\Carrier\Matrixrate
     */
    protected $_matrixrate;

    /**
     * @var \Webshopapps\Matrixrate\Model\Resource\Carrier\Matrixrate\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Webshopapps\Matrixrate\Model\Resource\Carrier\Matrixrate\CollectionFactory $collectionFactory
     * @param \Webshopapps\Matrixrate\Model\Carrier\Matrixrate $matrixrate
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Webshopapps\Matrixrate\Model\Resource\Carrier\Matrixrate\CollectionFactory $collectionFactory,
        \Webshopapps\Matrixrate\Model\Carrier\Matrixrate $matrixrate,
        array $data = []
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_matrixrate = $matrixrate;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * Define grid properties
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('shippingMatrixrateGrid');
        $this->_exportPageSize = 10000;
    }

    /**
     * Set current website
     *
     * @param int $websiteId
     * @return $this
     */
    public function setWebsiteId($websiteId)
    {
        $this->_websiteId = $this->_storeManager->getWebsite($websiteId)->getId();
        return $this;
    }

    /**
     * Retrieve current website id
     *
     * @return int
     */
    public function getWebsiteId()
    {
        if (is_null($this->_websiteId)) {
            $this->_websiteId = $this->_storeManager->getWebsite()->getId();
        }
        return $this->_websiteId;
    }

    /**
     * Set current website
     *
     * @param string $name
     * @return $this
     */
    public function setConditionName($name)
    {
        $this->_conditionName = $name;
        return $this;
    }

    /**
     * Retrieve current website id
     *
     * @return int
     */
    public function getConditionName()
    {
        return $this->_conditionName;
    }

    /**
     * Prepare shipping table rate collection
     *
     * @return \Webshopapps\Matrixrate\Block\Adminhtml\Carrier\Matrixrate\Grid
     */
    protected function _prepareCollection()
    {
        /** @var $collection \Webshopapps\Matrixrate\Model\Resource\Carrier\Matrixrate\Collection */
        $collection = $this->_collectionFactory->create();
        $collection->setConditionFilter($this->getConditionName())->setWebsiteFilter($this->getWebsiteId());

        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare table columns
     *
     * @return \Magento\Backend\Block\Widget\Grid\Extended
     */
    protected function _prepareColumns()
    {

        $this->addColumn('dest_country', array(
            'header'    => __('Country'),
            'index'     => 'dest_country',
            'default'   => '*',
        ));

        $this->addColumn('dest_region', array(
            'header'    => __('Region/State'),
            'index'     => 'dest_region',
            'default'   => '*',
        ));

        $this->addColumn('dest_city', array(
            'header'    => __('City'),
            'index'     => 'dest_city',
            'default'   => '*',
        ));

        $this->addColumn('dest_zip', array(
            'header'    => __('Zip/Postal Code From'),
            'index'     => 'dest_zip',
        ));

        $this->addColumn('dest_zip_to', array(
            'header'    => __('Zip/Postal Code To'),
            'index'     => 'dest_zip_to',
        ));

        $label = $this->_matrixrate->getCode('condition_name_short', $this->getConditionName());

        $this->addColumn('condition_from_value', array(
            'header'    => $label.' From',
            'index'     => 'condition_from_value',
        ));

        $this->addColumn('condition_to_value', array(
            'header'    => $label.' To',
            'index'     => 'condition_to_value',
        ));

        $this->addColumn('price', array(
            'header'    => __('Shipping Price'),
            'index'     => 'price',
        ));

        $this->addColumn('delivery_type', array(
            'header'    => __('Delivery Type'),
            'index'     => 'delivery_type',
        ));

        return parent::_prepareColumns();
    }
}
