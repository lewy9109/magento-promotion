<?php

namespace KrystianLewandowski\Promotions\Model\ResourceModel\PromotionGroup;

use KrystianLewandowski\Promotions\Model\PromotionGroup;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @construct
     */
    protected function _construct(): void
    {
        $this->_init(PromotionGroup::class, \KrystianLewandowski\Promotions\Model\ResourceModel\PromotionGroup::class);
    }
}