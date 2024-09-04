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

    /**
     * @inheritdoc
     */
    protected function _initSelect(): self
    {
        parent::_initSelect();
        $this->getSelect()->join(
            ['relation' => $this->getTable('krystian_promotion_group_relation')],
            'main_table.promotion_group_id = relation.promotion_group_id',
            []
        )->join(
            ['promotion' => $this->getTable('krystian_promotion')],
            'relation.promotion_id = promotion.promotion_id',
            ['promotion.*']
        );

        return $this;
    }

    /**
     * @return array
     */
    public function getFormattedData(): array
    {
        $data = [];
        foreach ($this->getData() as $item) {
            $promotionGroupId = $item['promotion_group_id'];
            if (!isset($data[$promotionGroupId])) {
                $data[$promotionGroupId] = [
                    'promotion_group_id' => $item['promotion_group_id'],
                    'name' => $item['name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at'],
                    'promotions' => []
                ];
            }
            $data[$promotionGroupId]['promotions'][] = [
                'promotion_id' => $item['promotion_id'],
                'name' => $item['name'],
                'created_at' => $item['created_at'],
                'updated_at' => $item['updated_at']
            ];
        }
        return array_values($data);
    }


}