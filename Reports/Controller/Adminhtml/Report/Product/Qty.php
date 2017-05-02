<?php

namespace End\Reports\Controller\Adminhtml\Report\Product;

use Magento\Reports\Controller\Adminhtml\Report\Product;

class Qty extends Product
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magento_Reports::report_products_qty';

    /**
     * Qty Change Report action
     *
     * @return void
     */
    public function execute()
    {
        $this->_initAction()->_setActiveMenu(
            'End_Reports::report_products_qty'
        )->_addBreadcrumb(
            __('Product quantity changed'),
            __('Product quantity changed')
        );
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Product Quantity Changed Report'));
        $this->_view->renderLayout();
    }
}
