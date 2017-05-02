<?php

namespace End\Reports\Model\Product;

use End\Reports\Api\Data\QtyChangeInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use End\Reports\Api\QtyChangeRepositoryInterface as QtyChangeRepositoryInterface;
use End\Reports\Model\ResourceModel\Product\QtyChange as QtyChangeResource;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Stdlib\DateTime\DateTime;

class QtyChangeRepository implements QtyChangeRepositoryInterface
{
    /**
     * @var DateTime
     */
    protected $dateTime;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var QtyChangeResource
     */
    private $resource;

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param QtyChangeResource $resource
     * @param DateTime $dateTime
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        QtyChangeResource $resource,
        DateTime $dateTime

    ) {
        $this->productRepository = $productRepository;
        $this->resource = $resource;
        $this->dateTime = $dateTime;
    }

    /**
     * @inheritdoc
     */
    public function save(QtyChangeInterface $qtyChange)
    {
        try {
            $product  = $this->productRepository->getById($qtyChange->getProductId());
            $qtyChange->setProductSku($product->getSku());
            $qtyChange->setUpdatedAt($this->dateTime->gmtDate());
            $this->resource->save($qtyChange);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Unable to save quantity change item'), $exception);
        }

        return $qtyChange;
    }
}
