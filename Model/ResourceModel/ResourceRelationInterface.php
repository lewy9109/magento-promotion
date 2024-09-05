<?php

namespace KrystianLewandowski\Promotions\Model\ResourceModel;

interface ResourceRelationInterface
{
    /**
     * @return string
     */
    public const RELATION_PROMOTION_GROUP = 'krystian_promotion_group_relation';

    /**
     * @return string
     */
    public const RELATION_FIELD_PROMOTION_GROUP = 'promotion_group_id';

    /**
     * @return string
     */
    public const RELATION_FIELD_PROMOTION = 'promotion_id';
}