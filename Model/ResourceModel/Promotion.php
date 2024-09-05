<?php

namespace KrystianLewandowski\Promotions\Model\ResourceModel;

use Exception;
use KrystianLewandowski\Promotions\Api\Data\PromotionInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Promotion extends AbstractDb implements ResourceRelationInterface
{
    /**
     * @return string
     */
    public const MAIN_TABLE = 'krystian_promotion';

    /**
     * @return string
     */
    public const FIELD_ID = 'promotion_id';

    /**
     * @construct
     */
    protected function _construct(): void
    {
        $this->_init(self::MAIN_TABLE, self::FIELD_ID);
    }

    /**
     * @param AbstractModel $object
     *
     * @return $this
     * @throws Exception
     */
    protected function _afterSave(AbstractModel $object): self
    {
        parent::_afterSave($object);
        $this->saveRelation($object->getId(), $object->getData(self::RELATION_FIELD_PROMOTION_GROUP) ?? []);
        return $this;
    }

    /**
     * @param AbstractModel $object
     *
     * @return $this
     */
    protected function _afterLoad(AbstractModel $object): self
    {
        parent::_afterLoad($object);
        if (!$object->getId()) {
            return $this;
        }
        $promotionGroupIds = $this->getRelation($object->getId());
        $object->setData(PromotionInterface::PROMOTION_GROUP_ID, $promotionGroupIds);
        return $this;
    }

    /**
     * @param int   $objectId
     * @param int[] $ids
     *
     * @return void
     * @throws Exception
     */
    protected function saveRelation(int $objectId, array $ids): void
    {
        $conn = $this->getConnection();
        if ($conn) {
            $conn->delete(
                $this->getRelationTableName(),
                sprintf('%s = %d', self::RELATION_FIELD_PROMOTION_GROUP, $objectId)
            );

            $data = [];
            if ($ids) {
                foreach ($ids as $id) {
                    $data[] = [
                        self::RELATION_FIELD_PROMOTION => $objectId,
                        self::RELATION_FIELD_PROMOTION_GROUP => $id
                    ];
                }

                try {
                    $conn->insertMultiple(
                        $this->getRelationTableName(),
                        $data
                    );
                } catch (Exception $e) {
                    throw new Exception(sprintf('Probably promotion group with some ids: %s not exist', implode(', ', $ids)));
                }
            }
        }
    }

    /**
     * @param int $objectId
     *
     * @return array
     */
    protected function getRelation(int $objectId): array
    {
        $conn = $this->getConnection();
        if ($conn) {
            $select = $conn->select()
                ->from($this->getRelationTableName(), self::RELATION_FIELD_PROMOTION_GROUP)
                ->where(sprintf('%s = %d', self::RELATION_FIELD_PROMOTION, $objectId));
            return $conn->fetchCol($select);
        }

        return [];
    }

    /**
     * @return string
     */
    public function getRelationTableName(): string
    {
        return self::RELATION_PROMOTION_GROUP;
    }
}