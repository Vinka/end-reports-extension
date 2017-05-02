<?php

namespace End\Reports\Api\Data;


interface QtyChangeInterface
{
    const TYPE_CUSTOMER_PURCHASE = 1;
    const TYPE_API = 2;
    const TYPE_ADMIN_USER = 3;

    const PRODUCT_ID = 'product_id';
    const PRODUCT_SKU = 'product_sku';
    const QTY_BEFORE = 'qty_before';
    const QTY_AFTER = 'qty_after';
    const UPDATED_AT = 'updated_at';
    const TYPE_ID = 'type_id';

    /**
     * @return int|null
     */
    public function getProductId();

    /**
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId);

    /**
     * @return string
     */
    public function getProductSku();

    /**
     * @param string $sku
     * @return $this
     */
    public function setProductSku($productSku);

    /**
     * @return int|null
     */
    public function getQtyBefore();

    /**
     * @param int $qtyBefore
     * @return this
     */
    public function setQtyBefore($qtyBefore);

    /**
     * @return int|null
     */
    public function getQtyAfter();

    /**
     * @param int $qtyBefore
     * @return this
     */
    public function setQtyAfter($qtyBefore);

    /**
     * @return string
     */
    public function getUpdatedAt();

    /**
     * @param int $qtyBefore
     * @return this
     */
    public function setUpdatedAt($date);

    /**
     * @return int|null
     */
    public function getTypeId();

    /**
     * @param int $typeId
     * @return this
     */
    public function setTypeId($typeId);

}