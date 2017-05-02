<?php

namespace End\Reports\Plugin;

use Magento\CatalogInventory\Api\Data\StockItemInterface;
use Magento\CatalogInventory\Model\Stock\StockItemRepository as StockRepository;
use End\Reports\Api\Data\QtyChangeInterface as Type;
use End\Reports\Api\StockManagementInterface;

class StockItemRepository
{
    /**
     * @var stockItemRepository
     */
    private $stockItemRepository;

    /**
     * @var StockRepository
     */
    private $stockManagement;

    public function __construct(
        StockRepository $stockItemRepository,
        StockManagementInterface $stockManagement
    )
    {
        $this->stockItemRepository = $stockItemRepository;
        $this->stockManagement = $stockManagement;
    }

    /**
     * @param \Magento\CatalogInventory\Model\Stock\StockItemRepository $subject
     * @param \Closure $proceed
     * @param StockItemInterface $stockItem
     * @return StockItemInterface
     */
    public function aroundSave($subject, $proceed, StockItemInterface $stockItem)
    {
        $originalStockItem = $this->stockItemRepository->get($stockItem->getProductId());

        $result = $proceed($stockItem);

        $productQtyBefore = $originalStockItem->getQty();
        $productQtyAfter = $stockItem->getQty();

        $this->stockManagement->registerStockChange($stockItem->getProductId(), $productQtyBefore, $productQtyAfter, Type::TYPE_ADMIN_USER);

        return $result;
    }
}


