<?php

namespace End\Reports\Model\ResourceModel\Product\QtyChange;

use End\Reports\Model\Product\QtyChange;
use End\Reports\Model\ResourceModel\Product\QtyChange as QtyChangeResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init(QtyChange::class, QtyChangeResource::class);
    }

}
