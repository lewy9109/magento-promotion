<?php

namespace KrystianLewandowski\Promotions\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Promotion extends AbstractDb
{
    const MAIN_TABLE = 'krystian_promotion';
    const FIELD_ID = 'promotion_id';

    /**
     * @construct
     */
    protected function _construct(): void
    {
        $this->_init(self::MAIN_TABLE, self::FIELD_ID);
    }
}