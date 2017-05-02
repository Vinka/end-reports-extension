<?php

namespace End\Reports\Model\Product\QtyChange\Source;

use End\Reports\Api\Data\QtyChangeInterface as QtyChangeType;
use Magento\Framework\Data\OptionSourceInterface;

class Type implements OptionSourceInterface
{
    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => QtyChangeType::TYPE_CUSTOMER_PURCHASE,
                'label' => __('Customer Purchase'),
            ],
            [
                'value' => QtyChangeType::TYPE_API,
                'label' => __('API'),
            ],
            [
                'value' => QtyChangeType::TYPE_ADMIN_USER,
                'label' => __('Admin User'),
            ],
        ];
    }
}
