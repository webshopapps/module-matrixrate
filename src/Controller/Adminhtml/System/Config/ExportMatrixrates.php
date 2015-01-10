<?php
/**
 *
 * @copyright Copyright (c) 2014 Zowta Ltd, Zowta LLC (http://www.WebShopApps.com)
 */
namespace Webshopapps\Matrixrate\Controller\Adminhtml\System\Config;

use Magento\Framework\App\ResponseInterface;
use Magento\Backend\Controller\Adminhtml\System\ConfigSectionChecker;
use Magento\Framework\App\Filesystem\DirectoryList;

class ExportTablerates extends \Magento\Backend\Controller\Adminhtml\System\AbstractConfig
{
    /**
     * @var \Magento\Framework\App\Response\Http\FileFactory
     */
    protected $_fileFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Backend\Model\Config\Structure $configStructure
     * @param ConfigSectionChecker $sectionChecker
     * @param \Magento\Framework\App\Response\Http\FileFactory $fileFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\Config\Structure $configStructure,
        ConfigSectionChecker $sectionChecker,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->_storeManager = $storeManager;
        $this->_fileFactory = $fileFactory;
        parent::__construct($context, $configStructure, $sectionChecker);
    }

    /**
     * Export shipping matrix rates in csv format
     *
     * @return ResponseInterface
     */
    public function execute()
    {
        $fileName = 'matrixrates.csv';
        /** @var $gridBlock \Webshopapps\Matrixrate\Block\Adminhtml\Carrier\Matrixrate\Grid */
        $gridBlock = $this->_view->getLayout()->createBlock(
            'Webshopapps\Matrixrate\Block\Adminhtml\Carrier\Matrixrate\Grid'
        );
        $website = $this->_storeManager->getWebsite($this->getRequest()->getParam('website'));
        if ($this->getRequest()->getParam('conditionName')) {
            $conditionName = $this->getRequest()->getParam('conditionName');
        } else {
            $conditionName = $website->getConfig('carriers/matrixrate/condition_name');
        }
        $gridBlock->setWebsiteId($website->getId())->setConditionName($conditionName);
        $content = $gridBlock->getCsvFile();
        return $this->_fileFactory->create($fileName, $content, DirectoryList::VAR_DIR);
    }
}
