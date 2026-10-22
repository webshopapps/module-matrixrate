<?php
/**
 * ShipperHQ
 *
 * @category ShipperHQ
 * @package WebShopApps\MatrixRate
 * @copyright Copyright (c) 2026 Zowta LTD and Zowta LLC (http://www.ShipperHQ.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @author ShipperHQ Team sales@shipperhq.com
 */

namespace WebShopApps\MatrixRate\Block\Adminhtml\System\Config\Fieldset;

use Magento\Config\Block\System\Config\Form\Fieldset;

/**
 * Admin config header promoting the full ShipperHQ platform
 */
class Upsell extends Fieldset
{
    private const UTM = '?utm_source=magento&utm_medium=extension&utm_campaign=matrixrate';
    private const GRADIENT = 'linear-gradient(135deg,#2aaee9,#3a6edc)';

    /**
     * Return header comment part of html for fieldset
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _getHeaderCommentHtml($element)
    {
        $logo = $this->_escaper->escapeUrl(
            $this->getViewFileUrl('WebShopApps_MatrixRate::images/shipperhq_logo.png')
        );
        $benefits = [
            'Live rates from UPS, FedEx, USPS and dozens of other carriers',
            'Dimensional packing for accurate shipping costs',
            'Delivery dates, in-store pickup and local delivery',
            'Flexible rules for free shipping, surcharges and restrictions',
        ];
        $items = '';
        foreach ($benefits as $benefit) {
            $items .= '<li style="margin:0 0 6px;">' . $this->_escaper->escapeHtml(__($benefit)) . '</li>';
        }

        $html = '<div style="background:#fff;border:1px solid #e1e5ea;border-radius:6px;margin-bottom:12px;overflow:hidden;text-align:left;">'
            . '<div style="height:4px;background:' . self::GRADIENT . ';"></div>'
            . '<div style="display:flex;flex-wrap:wrap;gap:24px;padding:24px;color:#22272e;">'
            . '<div style="flex:1 1 380px;min-width:0;">'
            . '<img src="' . $logo . '" alt="ShipperHQ" style="max-width:200px;height:auto;margin-bottom:16px;">'
            . '<h3 style="margin:0 0 10px;font-size:20px;color:#22272e;">'
            . $this->_escaper->escapeHtml(__('Outgrown your rate tables?')) . '</h3>'
            . '<p style="margin:0 0 14px;font-size:14px;line-height:1.5;">'
            . $this->_escaper->escapeHtml(__(
                'ShipperHQ gives you complete control over the shipping rates and delivery options your '
                . 'customers see at checkout which means fewer shoppers abandon their cart at the shipping step.'
            )) . '</p>'
            . '<ul style="margin:0 0 18px;padding-left:20px;font-size:14px;line-height:1.5;">' . $items . '</ul>'
            . $this->button('Start your free trial', 'https://shipperhq.com/' . self::UTM, true)
            . $this->button('See how it works', 'https://shipperhq.com/magento-shipping-extension' . self::UTM, false)
            . '</div>'
            . '<div style="flex:0 1 280px;min-width:220px;align-self:flex-start;background:#f6f8fa;'
            . 'border:1px solid #e1e5ea;border-radius:6px;padding:16px;font-size:13px;">'
            . '<div style="margin:0 0 10px;font-size:14px;font-weight:600;color:#22272e;">'
            . $this->_escaper->escapeHtml(__('Setting up MatrixRate')) . '</div>'
            . '<ul style="margin:0;padding-left:18px;line-height:1.8;">'
            . '<li>' . $this->link(
                'MatrixRate knowledge base',
                'https://docs.shipperhq.com/webshopapps-and-matrixrates'
            ) . '</li>'
            . '<li>' . $this->link('Need help? Contact ShipperHQ', 'https://shipperhq.com/contact') . '</li>'
            . '</ul></div>'
            . '</div></div>';

        return $html;
    }

    private function link(string $label, string $url): string
    {
        return '<a href="' . $this->_escaper->escapeUrl($url) . '" target="_blank" rel="noopener">'
            . $this->_escaper->escapeHtml(__($label)) . '</a>';
    }

    private function button(string $label, string $url, bool $primary): string
    {
        $style = 'display:inline-block;margin:0 10px 8px 0;padding:10px 20px;border-radius:4px;font-size:14px;'
            . 'font-weight:600;text-decoration:none;';
        $style .= $primary
            ? 'background:' . self::GRADIENT . ';color:#fff;border:1px solid #3a6edc;'
            : 'background:#fff;color:#3a6edc;border:1px solid #3a6edc;';

        return '<a href="' . $this->_escaper->escapeUrl($url) . '" target="_blank" rel="noopener" style="' . $style . '">'
            . $this->_escaper->escapeHtml(__($label)) . '</a>';
    }
}
