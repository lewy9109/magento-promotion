<?php

namespace KrystianLewandowski\Promotions\Api\Data;

interface PromotionGroupInterface
{
    public const ID = 'id';
    public const NAME = 'name';
    public const CREATE_AT = 'created_at';
    public const UPDATED_AT = 'updated';

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id): self;

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
     * @return array
     */
    public function getPromotions(): array;

    /**
     * @param PromotionInterface $promotion
     *
     * @return self
     */
    public function addPromotions(PromotionInterface $promotion): self;
}