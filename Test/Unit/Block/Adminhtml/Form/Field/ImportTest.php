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

use Magento\Framework\Escaper;
use Magento\Framework\Math\Random;
use PHPUnit\Framework\TestCase;

class ImportTest extends TestCase
{
    /**
     * @var \WebShopApps\MatrixRate\Block\Adminhtml\Form\Field\Import
     */
    protected $object;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    protected $formMock;

    protected function setUp(): void
    {
        $this->formMock = $this->getMockBuilder(\Magento\Framework\Data\Form::class)
            ->addMethods(['getFieldNameSuffix', 'getHtmlIdPrefix', 'getHtmlIdSuffix'])
            ->onlyMethods(['addSuffixToName'])
            ->disableOriginalConstructor()
            ->getMock();
        $randomMock = $this->getMockBuilder(Random::class)->disableOriginalConstructor()->getMock();
        $randomMock->method('getRandomString')->willReturn('123456abcdefg');
        $testData = ['name' => 'test_name', 'html_id' => 'test_html_id'];
        $testHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->object = $testHelper->getObject(
            \WebShopApps\MatrixRate\Block\Adminhtml\Form\Field\Import::class,
            [
                'data' => $testData,
                '_escaper' => $testHelper->getObject(Escaper::class),
                'random' => $randomMock
            ]
        );
        $this->object->setForm($this->formMock);

    }

    public function testGetNameWhenFormFiledNameSuffixIsEmpty()
    {
        $this->formMock->expects($this->once())->method('getFieldNameSuffix')->will($this->returnValue(false));
        $this->formMock->expects($this->never())->method('addSuffixToName');
        $actual = $this->object->getName();
        $this->assertEquals('test_name', $actual);
    }

    public function testGetNameWhenFormFiledNameSuffixIsNotEmpty()
    {
        $this->formMock->expects($this->once())->method('getFieldNameSuffix')->will($this->returnValue(true));
        $this->formMock->expects($this->once())->method('addSuffixToName')->will($this->returnValue('test_suffix'));
        $actual = $this->object->getName();
        $this->assertEquals('test_suffix', $actual);
    }

    public function testGetElementHtml()
    {
        $this->formMock->expects(
            $this->any()
        )->method(
            'getHtmlIdPrefix'
        )->willReturn(
            'test_name_prefix'
        );
        $this->formMock->expects(
            $this->any()
        )->method(
            'getHtmlIdSuffix'
        )->willReturn(
            'test_name_suffix'
        );
        $testString = $this->object->getElementHtml();
        $this->assertStringStartsWith(
            '<input id="time_condition" type="hidden" name="test_name" value="',
            $testString
        );
        $this->assertStringContainsString(
            '<input id="test_name_prefixtest_html_idtest_name_suffix" ' .
            'name="test_name"  data-ui-id="form-element-test_name" value="" type="file"',
            $testString
        );
    }
}
