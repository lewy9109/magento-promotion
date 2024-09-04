<?php

namespace KrystianLewandowski\Promotions\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PromotionGroup extends AbstractDb
{
    public const string MAIN_TABLE = 'krystian_promotion';
    public const string FIELD_ID = 'promotion_group_id';

    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(self::MAIN_TABLE, self::FIELD_ID);
    }
}