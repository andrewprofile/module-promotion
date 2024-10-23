<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Model;

use Andrewprofile\Promotion\Api\Data\PromotionGroupInterface;
use Andrewprofile\Promotion\Api\Data\PromotionGroupInterfaceFactory;
use Andrewprofile\Promotion\Api\Data\PromotionGroupSearchResultsInterfaceFactory;
use Andrewprofile\Promotion\Api\PromotionGroupRepositoryInterface;
use Andrewprofile\Promotion\Model\ResourceModel\PromotionGroup as ResourcePromotionGroup;
use Andrewprofile\Promotion\Model\ResourceModel\PromotionGroup\CollectionFactory as PromotionGroupCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class PromotionGroupRepository implements PromotionGroupRepositoryInterface
{

    /**
     * @var PromotionGroupCollectionFactory
     */
    protected $promotionGroupCollectionFactory;

    /**
     * @var PromotionGroupInterfaceFactory
     */
    protected $promotionGroupFactory;

    /**
     * @var ResourcePromotionGroup
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var PromotionGroup
     */
    protected $searchResultsFactory;


    /**
     * @param ResourcePromotionGroup $resource
     * @param PromotionGroupInterfaceFactory $promotionGroupFactory
     * @param PromotionGroupCollectionFactory $promotionGroupCollectionFactory
     * @param PromotionGroupSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourcePromotionGroup $resource,
        PromotionGroupInterfaceFactory $promotionGroupFactory,
        PromotionGroupCollectionFactory $promotionGroupCollectionFactory,
        PromotionGroupSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->promotionGroupFactory = $promotionGroupFactory;
        $this->promotionGroupCollectionFactory = $promotionGroupCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(PromotionGroupInterface $promotionGroup)
    {
        try {
            $this->resource->save($promotionGroup);
            $promotionGroup = $this->get($promotionGroup->getPromotionGroupId());
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the Promotion Group: %1',
                $exception->getMessage()
            ));
        }
        return $promotionGroup;
    }

    /**
     * @inheritDoc
     */
    public function get($promotionGroupId)
    {
        $promotionGroup = $this->promotionGroupFactory->create();
        $this->resource->load($promotionGroup, $promotionGroupId);
        if (!$promotionGroup->getId()) {
            throw new NoSuchEntityException(__("Promotion Group with id '%1' does not exist.", $promotionGroupId));
        }
        return $promotionGroup;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        SearchCriteriaInterface $searchCriteria
    ) {
        $collection = $this->promotionGroupCollectionFactory->create();

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
    public function delete(PromotionGroupInterface $promotionGroup)
    {
        try {
            $promotionGroupModel = $this->promotionGroupFactory->create();
            $this->resource->load($promotionGroupModel, $promotionGroup->getPromotionGroupId());
            $this->resource->delete($promotionGroupModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Promotion Group: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($promotionGroupId)
    {
        return $this->delete($this->get($promotionGroupId));
    }
}

