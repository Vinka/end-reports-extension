<?php

namespace End\Reports\Plugin;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\CatalogInventory\Api\StockStateInterface;
use End\Reports\Api\Data\QtyChangeInterface as Type;
use End\Reports\Api\StockManagementInterface;

class Stock
{
    /**
     * @var StockStateInterface
     */
    private $stockState;

    /**
     * @var StockManagementInterface
     */
    private $stockManagement;

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param StockStateInterface $stockState
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        StockStateInterface $stockState,
        StockManagementInterface $stockManagement
    )
    {
        $this->stockState = $stockState;
        $this->stockManagement = $stockManagement;
    }

    /**
     * @param \Magento\CatalogInventory\Model\ResourceModel\Stock $subject
     * @param \Closure $proceed
     * @param array $items
     * @param int $websiteId
     * @param string $operator
     */
    public function aroundCorrectItemsQty($subject, $proceed, array $items, $websiteId, $operator)
    {
        $proceed($items, $websiteId, $operator);

        foreach ($items as $itemId => $qty) {
            $productQtyBefore = $this->stockState->getStockQty($itemId, $websiteId);
            $productQtyAfter = $this->calculateQty($productQtyBefore, $qty, $operator);

            $this->stockManagement->registerStockChange($itemId, $productQtyBefore, $productQtyAfter, Type::TYPE_API);
        }
    }

    /**
     * @param int $productQty
     * @param int $orderedQty
     * @param string $operator
     * @return int
     */
    private function calculateQty($productQty, $orderedQty, $operator)
    {
        $modifier = $operator == '-' ? -1 : 1;
        return $productQty + ($orderedQty * $modifier);
    }

}


