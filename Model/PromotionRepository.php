<?php

namespace KrystianLewandowski\Promotions\Model;

use KrystianLewandowski\Promotions\Api\Data\PromotionInterface;
use KrystianLewandowski\Promotions\Api\PromotionRepositoryInterface;
use KrystianLewandowski\Promotions\Model\ResourceModel\Promotion as PromotionResource;
use KrystianLewandowski\Promotions\Api\Data\PromotionInterfaceFactory;
use KrystianLewandowski\Promotions\Model\ResourceModel\Promotion\Collection;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Exception;

class PromotionRepository implements PromotionRepositoryInterface
{
    /**
     * @param PromotionResource             $resource
     * @param PromotionInterfaceFactory     $promotionFactory
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        private PromotionResource $resource,
        private PromotionInterfaceFactory $promotionFactory,
        private SearchResultsInterfaceFactory $searchResultsFactory,
    ) {
    }

    /**
     * @param PromotionInterface $promotion
     *
     * @return PromotionInterface
     * @throws AlreadyExistsException
     */
    public function create(PromotionInterface $promotion): PromotionInterface
    {
        $this->resource->save($promotion);

        return $promotion;
    }

    /**
     * @throws Exception
     */
    public function getById(int $id): PromotionInterface
    {
        $promotion = $this->promotionFactory->create();
        $this->resource->load($promotion, $id);

        if (!$promotion->getId()) {
            throw new Exception(__('Promotion with id %1 not found', $id));
        }

        return $promotion;
    }

    /**
     * @param int $id
     *
     * @throws Exception
     */
    public function delete(int $id): void
    {
        $promotion = $this->getById($id);

        $this->resource->delete($promotion);
    }

    /**
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return SearchResultsInterface
     */
    public function getList(?SearchCriteriaInterface $searchCriteria = null): SearchResultsInterface
    {
        /**
         * @var Collection $collection
         */
        $collection = $this->promotionFactory->create()->getCollection();

        if($searchCriteria){
            $collection->setCurPage($searchCriteria->getCurrentPage());
            $collection->setPageSize($searchCriteria->getPageSize());
        }

        /**
         * @var SearchResultsInterface $searchResults
         */
        $searchResults = $this->searchResultsFactory->create();

        if ($searchCriteria) {
            $searchResults->setSearchCriteria($searchCriteria);
        }
        $searchResults->setItems($collection->getData());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}