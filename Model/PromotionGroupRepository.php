<?php

namespace KrystianLewandowski\Promotions\Model;

use KrystianLewandowski\Promotions\Api\Data\PromotionGroupInterface;
use KrystianLewandowski\Promotions\Api\PromotionsGroupRepositoryInterface;
use KrystianLewandowski\Promotions\Model\ResourceModel\Promotion\Collection;
use KrystianLewandowski\Promotions\Model\ResourceModel\PromotionGroup as PromotionGroupResource;
use KrystianLewandowski\Promotions\Api\Data\PromotionGroupInterfaceFactory;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Exception;
use Magento\Framework\Exception\AlreadyExistsException;

class PromotionGroupRepository implements PromotionsGroupRepositoryInterface
{
    public function __construct(
        private PromotionGroupResource         $resource,
        private PromotionGroupInterfaceFactory $promotionGroupFactory,
        private SearchResultsInterfaceFactory  $searchResultsFactory,
    ) {
    }

    /**
     * @param PromotionGroupInterface $promotionGroup
     *
     * @return PromotionGroupInterface
     * @throws AlreadyExistsException
     */
    public function create(PromotionGroupInterface $promotionGroup): PromotionGroupInterface
    {
        $this->resource->save($promotionGroup);

        return $promotionGroup;
    }

    /**
     * @param int $id
     *
     * @return PromotionGroupInterface
     * @throws Exception
     */
    public function getById(int $id): PromotionGroupInterface
    {
        $promotionGroup = $this->promotionGroupFactory->create();
        $this->resource->load($promotionGroup, $id);

        if (!$promotionGroup->getId()) {
            throw new Exception(__('Promotion Group with id %1 not found', $id));
        }

        return $promotionGroup;
    }

    /**
     * @param int $id
     *
     * @return void
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
        $collection = $this->promotionGroupFactory->create()->getCollection();

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