<?php

namespace End\Reports\Api;

use End\Reports\Api\Data\QtyChangeInterface;

interface QtyChangeRepositoryInterface
{

    /**
     * Create or update a data
     * @param QtyChangeInterface $qtyChange
     */
    public function save(QtyChangeInterface $qtyChange);
}