<?php

namespace KrystianLewandowski\Promotions\Model;

use KrystianLewandowski\Promotions\Api\Data\PromotionGroupInterface;
use KrystianLewandowski\Promotions\Api\Data\PromotionInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;

class Promotion extends AbstractModel implements PromotionInterface
{
    /**
     * @return void
     * @throws LocalizedException
     */
    public function _construct(): void
    {
        $this->_init(ResourceModel\Promotion::class);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getData(self::ID);
    }

    /**
     * @param mixed $id
     *
     * @return void
     */
    public function setId($id): void
    {
        $this->setData(self::ID, $id);
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param string|null $createdAt
     *
     * @return void
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->setData(self::CREATE_AT, $createdAt);
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATE_AT);
    }

    /**
     * @param string|null $updatedAt
     *
     * @return void
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param int[] $promotionGroupIds
     *
     * @return void
     */
    public function setPromotionGroups(array $promotionGroupIds): void
    {
        $this->setData(self::PROMOTION_GROUP_ID, $promotionGroupIds);
    }

    /**
     * @return int[]
     */
    public function getPromotionGroups(): array
    {
        return $this->getData(self::PROMOTION_GROUP_ID);
    }
}