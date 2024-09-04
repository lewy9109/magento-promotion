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
     * @param int $id
     *
     * @return void
     */
    public function delete(int $id): void;

    /**
     * @param int $id
     *
     * @return PromotionInterface
     */
    public function getById(int $id): PromotionInterface;

    /**
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return SearchResultsInterface
     */
    public function getList(?SearchCriteriaInterface $searchCriteria = null): SearchResultsInterface;
}