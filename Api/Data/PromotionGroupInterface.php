<?php

namespace KrystianLewandowski\Promotions\Api\Data;

interface PromotionGroupInterface
{
    /**
     * @return string
     */
    public const ID = 'promotion_group_id';

    /**
     * @return string
     */
    public const NAME = 'name';

    /**
     * @return string
     */
    public const CREATED_AT = 'created_at';

    /**
     * @return string
     */
    public const UPDATED_AT = 'updated_at';

    /**
     * @return string
     */
    public const PROMOTION_ID = 'promotion_id';

    /**
     * @param mixed $id
     *
     * @return void
     */
    public function setId($id): void;

    /**
     * Identifier getter
     *
     * @return mixed
     */
    public function getId(): mixed;

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?string $createdAt): self;

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * @param string|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?string $updatedAt): self;

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * @param int[] $promotionIds
     *
     * @return self
     */
    public function setPromotions(array $promotionIds): self;

    /**
     * @return int[]
     */
    public function getPromotions(): array;
}