<?php

namespace KrystianLewandowski\Promotions\Model;

use KrystianLewandowski\Promotions\Api\Data\PromotionGroupInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;

class PromotionGroup extends AbstractModel implements PromotionGroupInterface
{
    /**
     * @return void
     * @throws LocalizedException
     */
    public function _construct(): void
    {
        $this->_init(ResourceModel\PromotionGroup::class);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getData(self::ID);
    }

    public function setId($id): void
    {
        $this->setData(self::ID, $id);
    }

    public function setName(string $name): self
    {
        $this->setData(self::NAME, $name);

        return $this;
    }

    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    public function setCreatedAt(?string $createdAt): self
    {
        $this->setData(self::CREATED_AT, $createdAt);

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setUpdatedAt(?string $updatedAt): self
    {
        $this->setData(self::UPDATED_AT, $updatedAt);

        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setPromotions(array $promotionIds): PromotionGroupInterface
    {
        $this->setData(self::PROMOTION_ID, $promotionIds);

        return $this;
    }

    public function getPromotions(): array
    {
        return $this->getData(self::PROMOTION_ID);
    }
}