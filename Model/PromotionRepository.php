<?php

namespace KrystianLewandowski\Promotions\Model;

use Exception;
use KrystianLewandowski\Promotions\Api\Data\PromotionInterface;
use KrystianLewandowski\Promotions\Api\PromotionRepositoryInterface;
use KrystianLewandowski\Promotions\Model\ResourceModel\Promotion as PromotionResource;
use KrystianLewandowski\Promotions\Api\Data\PromotionInterfaceFactory;
use KrystianLewandowski\Promotions\Model\ResourceModel\Promotion\CollectionFactory as PromoCollectionFactory;
use KrystianLewandowski\Promotions\Model\ResourceModel\Promotion\Collection;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;

class PromotionRepository implements PromotionRepositoryInterface
{


    public function __construct(
        private PromotionResource $resource,
        private PromotionInterfaceFactory $promotionFactory,
        private SearchResultsInterfaceFactory $searchResultsFactory,
        private PromoCollectionFactory $collectionFactory, //to remove ???
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

        $promotionModel = $this->promotionFactory->create();
        $promotionModel->setName($promotion->getName());


        $this->resource->save($promotionModel);

        return $promotion;
    }

    /**
     * @param PromotionInterface $promotion
     *
     * @throws Exception
     */
    public function delete(PromotionInterface $promotion): void
    {
       $this->resource->delete($promotion);
    }

    public function getList(?SearchCriteriaInterface $searchCriteria = null): \Magento\Framework\Api\SearchResults
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
         * @var \Magento\Framework\Api\SearchResults $searchResults
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