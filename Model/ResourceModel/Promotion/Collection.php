<?php

namespace KrystianLewandowski\Promotions\Model\ResourceModel\Promotion;

use KrystianLewandowski\Promotions\Model\Promotion;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @construct
     */
    protected function _construct(): void
    {
        $this->_init(Promotion::class, \KrystianLewandowski\Promotions\Model\ResourceModel\Promotion::class);
    }
}