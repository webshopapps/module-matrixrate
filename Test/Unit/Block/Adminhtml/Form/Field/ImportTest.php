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
namespace WebShopApps\MatrixRate\Test\Unit\Block\Adminhtml\Form\Field;

class ImportTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \WebShopApps\MatrixRate\Block\Adminhtml\Form\Field\Import
     */
    protected $_object;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_formMock;

    protected function setUp()
    {
        $this->_formMock = $this->getMock(
            'Magento\Framework\Data\Form',
            ['getFieldNameSuffix', 'addSuffixToName'],
            [],
            '',
            false,
            false
        );
        $testData = ['name' => 'test_name', 'html_id' => 'test_html_id'];
        $testHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_object = $testHelper->getObject(
            'WebShopApps\MatrixRate\Block\Adminhtml\Form\Field\Import',
            ['data' => $testData]
        );
        $this->_object->setForm($this->_formMock);
    }

    public function testGetNameWhenFormFiledNameSuffixIsEmpty()
    {
        $this->_formMock->expects($this->once())->method('getFieldNameSuffix')->will($this->returnValue(false));
        $this->_formMock->expects($this->never())->method('addSuffixToName');
        $actual = $this->_object->getName();
        $this->assertEquals('test_name', $actual);
    }

    public function testGetNameWhenFormFiledNameSuffixIsNotEmpty()
    {
        $this->_formMock->expects($this->once())->method('getFieldNameSuffix')->will($this->returnValue(true));
        $this->_formMock->expects($this->once())->method('addSuffixToName')->will($this->returnValue('test_suffix'));
        $actual = $this->_object->getName();
        $this->assertEquals('test_suffix', $actual);
    }

    public function testGetElementHtml()
    {
        $this->_formMock->expects(
            $this->any()
        )->method(
            'getHtmlIdPrefix'
        )->will(
            $this->returnValue('test_name_prefix')
        );
        $this->_formMock->expects(
            $this->any()
        )->method(
            'getHtmlIdSuffix'
        )->will(
            $this->returnValue('test_name_suffix')
        );
        $testString = $this->_object->getElementHtml();
        $this->assertStringStartsWith(
            '<input id="time_condition" type="hidden" name="test_name" value="',
            $testString
        );
        $this->assertStringEndsWith(
            '<input id="test_html_id" name="test_name"  data-ui-id="form-element-test_name"' .
            ' value="" type="file"/>',
            $testString
        );
    }
}
