<?php

namespace End\Reports\Model\Product;

use End\Reports\Api\Data\QtyChangeInterface;
use End\Reports\Model\ResourceModel\Product\QtyChange as QtyChangeResource;
use Magento\Framework\Model\AbstractModel;

class QtyChange extends AbstractModel implements QtyChangeInterface
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init(QtyChangeResource::class);
    }

    /**
     * {@inheritdoc}
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * {@inheritdoc}
     */
    public function getProductId()
    {
        return $this->_getData(self::PRODUCT_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setProductSku($productSku)
    {
        return $this->setData(self::PRODUCT_SKU, $productSku);
    }

    /**
     * {@inheritdoc}
     */
    public function getProductSku()
    {
        return $this->_getData(self::PRODUCT_SKU);
    }

    /**
     * {@inheritdoc}
     */
    public function setQtyBefore($qtyBefore)
    {
        return $this->setData(self::QTY_BEFORE, $qtyBefore);
    }

    /**
     * {@inheritdoc}
     */
    public function getQtyBefore()
    {
        return $this->_getData(self::QTY_BEFORE);
    }

    /**
     * {@inheritdoc}
     */
    public function setQtyAfter($qtyAfter)
    {
        return $this->setData(self::QTY_AFTER, $qtyAfter);
    }

    /**
     * {@inheritdoc}
     */
    public function getQtyAfter()
    {
        return $this->_getData(self::QTY_AFTER);
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt()
    {
        return $this->_getData(self::UPDATED_AT);
    }

    /**
     * {@inheritdoc}
     */
    public function setTypeId($typeId)
    {
        return $this->setData(self::TYPE_ID, $typeId);
    }

    /**
     * {@inheritdoc}
     */
    public function getTypeId()
    {
        return $this->_getData(self::TYPE_ID);
    }
}
