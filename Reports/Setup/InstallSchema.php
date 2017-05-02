<?php

namespace End\Reports\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        /**
         * Create table 'report_product_qty_change'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('report_product_qty_change'))
            ->addColumn(
                'id',
                Table::TYPE_BIGINT,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Id'
            )
            ->addColumn(
                'product_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Product Id'
            )
            ->addColumn(
                'product_sku',
                Table::TYPE_TEXT,
                64,
                [],
                'Product SKU'
            )
            ->addColumn(
                'qty_before',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Quantity before update'
            )
            ->addColumn(
                'qty_after',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Quantity after update'
            )
            ->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'Updated At'
            )
            ->addColumn(
                'type_id',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'Type Id'
            )
            ->addIndex(
                $installer->getIdxName('report_product_qty_change_types', ['event_type_id']),
                ['type_id']
            )
            ->addForeignKey(
                $installer->getFkName(
                    'report_product_qty_change',
                    'product_id',
                    'catalog_product_entity',
                    'entity_id'
                ),
                'product_id',
                $installer->getTable('catalog_product_entity'),
                'entity_id',
                Table::ACTION_CASCADE
            )
            ->setComment('Reports Product Quantity Change Table');
        $installer->getConnection()->createTable($table);

    }
}
