<?php

namespace End\Reports\Model;

use End\Reports\Api\StockManagementInterface;
use End\Reports\Api\QtyChangeRepositoryInterface;
use End\Reports\Model\Product\QtyChangeFactory;

class StockManagement implements StockManagementInterface
{

    /**
     * @var QtyChangeFactory
     */
    private $qtyChangeFactory;

    /**
     * @var QtyChangeRepositoryInterface
     */
    private $qtyChangeRepository;

    public function __construct(
        QtyChangeFactory $qtyChangeFactory,
        QtyChangeRepositoryInterface $qtyChangeRepository
    ) {
        $this->qtyChangeFactory = $qtyChangeFactory;
        $this->qtyChangeRepository = $qtyChangeRepository;
    }

    /**
     * @inheritdoc
     */
    public function registerStockChange($id, $qtyBefore, $qtyAfter, $type)
    {
        $qtyChangeItem = $this->qtyChangeFactory->create();
        $qtyChangeItem->setProductId($id);
        $qtyChangeItem->setQtyBefore($qtyBefore);
        $qtyChangeItem->setQtyAfter($qtyAfter);
        $qtyChangeItem->setTypeId($type);

        $this->qtyChangeRepository->save($qtyChangeItem);
    }

}
