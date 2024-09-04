<?php

namespace KrystianLewandowski\Promotions\Model\ResourceModel;

interface ResourceRelationInterface
{
    public const string RELATION_PROMOTION_GROUP = 'krystian_promotion_group_relation';
    public const string RELATION_FIELD_PROMOTION_GROUP = 'promotion_group_id';
    public const string RELATION_FIELD_PROMOTION = 'promotion_id';
}