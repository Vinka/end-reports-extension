<?php

namespace End\Reports\Api;

interface StockManagementInterface
{

    /**
     * @param int $id
     * @param int $qtyBefore
     * @param int $qtyAfter
     * @param int $type
     */
    public function registerStockChange($id, $qtyBefore, $qtyAfter, $type);

}
