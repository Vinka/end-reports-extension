<?php

namespace End\Reports\Model\ResourceModel\Product;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class QtyChange extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('report_product_qty_change', 'id');
    }

}
