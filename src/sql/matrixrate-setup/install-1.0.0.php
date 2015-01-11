<?php
/**
 * @copyright Copyright (c) 2014 Zowta Ltd, Zowta LLC (http://www.WebShopApps.com)
 */

/** @var $installer \Magento\Setup\Module\SetupModule */
$installer = $this;

$installer->startSetup();

/**
 * Create table 'webshopapps_matrixrate'
 */
$table = $installer->getConnection()->newTable(
    $installer->getTable('webshopapps_matrixrate')
)->addColumn(
    'pk',
    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
    null,
    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
    'Primary key'
)->addColumn(
    'website_id',
    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
    null,
    ['nullable' => false, 'default' => '0'],
    'Website Id'
)->addColumn(
    'dest_country_id',
    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    4,
    ['nullable' => false, 'default' => '0'],
    'Destination coutry ISO/2 or ISO/3 code'
)->addColumn(
    'dest_region_id',
    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
    null,
    ['nullable' => false, 'default' => '0'],
    'Destination Region Id'
)->addColumn(
    'dest_city',
    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    30,
    ['nullable' => false, 'default' => ''],
    'Destination City'
)->addColumn(
    'dest_zip',
    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    10,
    ['nullable' => false, 'default' => '*'],
    'Destination Post Code (Zip) Range'
)->addColumn(
    'condition_name',
    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    20,
    ['nullable' => false],
    'Rate Condition name'
)->addColumn(
    'condition_from_value',
    \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
    '12,4',
    ['nullable' => false, 'default' => '0.0000'],
    'Rate condition from value'
)->addColumn(
    'condition_to_value',
    \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
    '12,4',
    ['nullable' => false, 'default' => '0.0000'],
    'Rate condition to value'
)->addColumn(
    'price',
    \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
    '12,4',
    ['nullable' => false, 'default' => '0.0000'],
    'Price'
)->addColumn(
    'cost',
    \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
    '12,4',
    ['nullable' => false, 'default' => '0.0000'],
    'Cost'
)->addColumn(
    'shipping_method',
    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    255,
    ['nullable' => false],
    'Shipping Method'
)->addIndex(
    $installer->getIdxName(
        'shipping_tablerate',
        ['website_id', 'dest_country_id', 'dest_region_id', 'dest_zip', 'condition_name',
            'condition_from_value','condition_to_value','shipping_method'],
        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
    ),
    ['website_id', 'dest_country_id','dest_city', 'dest_region_id', 'dest_zip', 'condition_name',
        'condition_from_value','condition_to_value','shipping_method'],
    ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
)->setComment(
    'WebShopApps Shipping MatrixRate'
);
$installer->getConnection()->createTable($table);


$installer->endSetup();

