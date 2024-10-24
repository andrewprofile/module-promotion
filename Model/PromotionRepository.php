<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Model;

use Andrewprofile\Promotion\Api\Data\PromotionInterface;
use Andrewprofile\Promotion\Api\Data\PromotionInterfaceFactory;
use Andrewprofile\Promotion\Api\Data\PromotionSearchResultsInterfaceFactory;
use Andrewprofile\Promotion\Api\PromotionRepositoryInterface;
use Andrewprofile\Promotion\Model\ResourceModel\Promotion as ResourcePromotion;
use Andrewprofile\Promotion\Model\ResourceModel\Promotion\CollectionFactory as PromotionCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class PromotionRepository implements PromotionRepositoryInterface
{

    /**
     * @var PromotionCollectionFactory
     */
    protected $promotionCollectionFactory;

    /**
     * @var ResourcePromotion
     */
    protected $resource;

    /**
     * @var PromotionInterfaceFactory
     */
    protected $promotionFactory;

    /**
     * @var Promotion
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourcePromotion $resource
     * @param PromotionInterfaceFactory $promotionFactory
     * @param PromotionCollectionFactory $promotionCollectionFactory
     * @param PromotionSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourcePromotion $resource,
        PromotionInterfaceFactory $promotionFactory,
        PromotionCollectionFactory $promotionCollectionFactory,
        PromotionSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->promotionFactory = $promotionFactory;
        $this->promotionCollectionFactory = $promotionCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(PromotionInterface $promotion)
    {
        try {
            $this->resource->save($promotion);
            $promotion = $this->get($promotion->getPromotionId());
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                "Could not save the promotion: %1",
                $exception->getMessage()
            ));
        }
        return $promotion;
    }

    /**
     * @inheritDoc
     */
    public function get($promotionId)
    {
        $promotion = $this->promotionFactory->create();
        $this->resource->load($promotion, $promotionId);
        if (!$promotion->getId()) {
            throw new NoSuchEntityException(__("Promotion with id '%1' does not exist.", $promotionId));
        }
        return $promotion;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    ) {
        $collection = $this->promotionCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(PromotionInterface $promotion)
    {
        try {
            $promotionModel = $this->promotionFactory->create();
            $this->resource->load($promotionModel, $promotion->getPromotionId());
            $this->resource->delete($promotionModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Promotion: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($promotionId)
    {
        return $this->delete($this->get($promotionId));
    }
}

