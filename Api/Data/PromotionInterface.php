<?php

namespace KrystianLewandowski\Promotions\Api\Data;

interface PromotionInterface
{
    public const ID = 'promotion_id';
    public const NAME = 'name';
    public const CREATE_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const PROMOTION_GROUP_ID = 'promotion_group_id';

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
     * @return void
     */
    public function setName(string $name): void;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string|null $createdAt
     *
     * @return void
     */
    public function setCreatedAt(?string $createdAt): void;

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * @param string|null $updatedAt
     *
     * @return void
     */
    public function setUpdatedAt(?string $updatedAt): void;

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * @param int[] $promotionGroupIds
     *
     * @return void
     */
    public function setPromotionGroups(array $promotionGroupIds): void;

    /**
     * @return null|int[]
     */
    public function getPromotionGroups(): ?array;
}