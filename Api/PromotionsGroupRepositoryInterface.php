<?php

namespace KrystianLewandowski\Promotions\Api;

use KrystianLewandowski\Promotions\Api\Data\PromotionGroupInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

interface PromotionsGroupRepositoryInterface
{
    /**
     * @param PromotionGroupInterface $promotionGroup
     *
     * @return PromotionGroupInterface
     */
    public function create(PromotionGroupInterface $promotionGroup): PromotionGroupInterface;

    /**
     * @param int $id
     *
     * @return void
     */
    public function delete(int $id): void;

    /**
     * @param int $id
     *
     * @return PromotionGroupInterface
     */
    public function getById(int $id): PromotionGroupInterface;

    /**
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return SearchResultsInterface
     */
    public function getList(?SearchCriteriaInterface $searchCriteria = null): SearchResultsInterface;
}