<?php

namespace KrystianLewandowski\Promotions\Api;

use KrystianLewandowski\Promotions\Api\Data\PromotionGroupInterface;

interface PromotionsGroupRepositoryInterface
{
    /**
     * @param PromotionGroupInterface $promotionGroup
     *
     * @return PromotionGroupInterface
     */
    public function save(PromotionGroupInterface $promotionGroup): PromotionGroupInterface;

    /**
     * @return void
     */
    public function delete(): void;

    /**
     * @return array<PromotionGroupInterface>
     */
    public function getList(): array;
}