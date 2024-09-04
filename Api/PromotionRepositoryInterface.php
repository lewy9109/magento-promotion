<?php

namespace KrystianLewandowski\Promotions\Api;

use KrystianLewandowski\Promotions\Api\Data\PromotionInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

interface PromotionRepositoryInterface
{
    /**
     * @param PromotionInterface $promotion
     *
     * @return PromotionInterface
     */
    public function create(PromotionInterface $promotion): PromotionInterface;

    /**
     * @param PromotionInterface $promotion
     *
     * @return void
     */
    public function delete(PromotionInterface $promotion): void;

    /**
     * @return array
     */
    public function getList( ): array;
}