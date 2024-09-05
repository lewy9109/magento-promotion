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

    /**
     * @param $id
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
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->setData(self::NAME, $name);

        return $this;
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
     * @return $this
     */
    public function setCreatedAt(?string $createdAt): self
    {
        $this->setData(self::CREATED_AT, $createdAt);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param string|null $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt(?string $updatedAt): self
    {
        $this->setData(self::UPDATED_AT, $updatedAt);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param array $promotionIds
     *
     * @return PromotionGroupInterface
     */
    public function setPromotions(array $promotionIds): PromotionGroupInterface
    {
        $this->setData(self::PROMOTION_ID, $promotionIds);

        return $this;
    }

    /**
     * @return array|int[]
     */
    public function getPromotions(): array
    {
        return $this->getData(self::PROMOTION_ID);
    }
}