<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Model;

use Andrewprofile\Promotion\Api\Data\PromotionGroupPromotionInterface;
use Andrewprofile\Promotion\Api\Data\PromotionGroupPromotionInterfaceFactory;
use Andrewprofile\Promotion\Api\PromotionGroupPromotionRepositoryInterface;
use Andrewprofile\Promotion\Model\ResourceModel\PromotionGroupPromotion as ResourcePromotionGroupPromotion;
use Andrewprofile\Promotion\Model\ResourceModel\PromotionGroupPromotion\CollectionFactory as PromotionGroupPromotionCollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Andrewprofile\Promotion\Model\ResourceModel\PromotionGroup\CollectionFactory as PromotionGroupCollectionFactory;
use Andrewprofile\Promotion\Model\ResourceModel\Promotion\CollectionFactory as PromotionCollectionFactory;

class PromotionGroupPromotionRepository implements PromotionGroupPromotionRepositoryInterface
{
    /**
     * @var PromotionGroupPromotionCollectionFactory
     */
    protected $promotionGroupPromotionCollectionFactory;

    /**
     * @var PromotionGroupPromotionInterfaceFactory
     */
    protected $promotionGroupPromotionFactory;

    /**
     * @var ResourcePromotionGroupPromotion
     */
    protected $resource;

    /**
     * @var PromotionGroupCollectionFactory
     */
    protected $promotionGroupCollectionFactory;

    /**
     * @var PromotionCollectionFactory
     */
    protected $promotionCollectionFactory;

    /**
     * @param ResourcePromotionGroupPromotion $resource
     * @param PromotionGroupPromotionInterfaceFactory $promotionGroupPromotionFactory
     * @param PromotionGroupPromotionCollectionFactory $promotionGroupPromotionCollectionFactory
     * @param PromotionGroupCollectionFactory $promotionGroupCollectionFactory
     * @param PromotionCollectionFactory $promotionCollectionFactory
     */
    public function __construct(
        ResourcePromotionGroupPromotion $resource,
        PromotionGroupPromotionInterfaceFactory $promotionGroupPromotionFactory,
        PromotionGroupPromotionCollectionFactory $promotionGroupPromotionCollectionFactory,
        PromotionGroupCollectionFactory $promotionGroupCollectionFactory,
        PromotionCollectionFactory $promotionCollectionFactory
    ) {
        $this->resource = $resource;
        $this->promotionGroupPromotionFactory = $promotionGroupPromotionFactory;
        $this->promotionGroupPromotionCollectionFactory = $promotionGroupPromotionCollectionFactory;
        $this->promotionGroupCollectionFactory = $promotionGroupCollectionFactory;
        $this->promotionCollectionFactory = $promotionCollectionFactory;
    }

    public function create(int $promotionId, int $promotionGroupId): PromotionGroupPromotionInterface
    {
        $promotionGroupPromotion = $this->promotionGroupPromotionFactory->create();
        $promotionGroupPromotion->setPromotionId($promotionId);
        $promotionGroupPromotion->setPromotionGroupId($promotionGroupId);

        $this->save($promotionGroupPromotion);

        return $promotionGroupPromotion;
    }

    public function save(PromotionGroupPromotionInterface $relation): PromotionGroupPromotionInterface
    {
        try {
            $this->resource->save($relation);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Could not add Promotion to Promotion Group'));
        }

        return $relation;
    }

    /**
     * @inerhitDoc
     */
    public function getPromotionGroupByPromotionId(int $promotionId)
    {
        $collection = $this->promotionGroupCollectionFactory->create();
        $tableName = $collection->getTable(ResourcePromotionGroupPromotion::TABLE_NAME);
        $collection
            ->addFieldToFilter(
                'promotion_promotion_group_relation.promotion_id',
                $promotionId
            )
            ->getSelect()
            ->joinLeft(
                ['promotion_promotion_group_relation' => $tableName],
                'main_table.promotion_group_id = promotion_promotion_group_relation.promotion_group_id',
                "promotion_id"
            )
            ->joinLeft(
                ['promotion' => $collection->getTable(\Andrewprofile\Promotion\Model\ResourceModel\Promotion::TABLE_NAME)],
                'promotion_promotion_group_relation.promotion_id = promotion.promotion_id',
                [
                    'promotion_name' => 'promotion.name',
                    'promotion_created_at' => 'promotion.created_at',
                    'promotion_updated_at' => 'promotion.updated_at'
                ]
            )->group(['promotion_promotion_group_relation.promotion_group_id']);

        return $collection->getData();
    }

    public function getPromotionByPromotionGroupId(int $promotionGroupId)
    {
        $collection = $this->promotionCollectionFactory->create();
        $tableName = $collection->getTable(ResourcePromotionGroupPromotion::TABLE_NAME);
        $collection
            ->addFieldToFilter(
                'promotion_promotion_group_relation.promotion_group_id',
                $promotionGroupId
            )
            ->getSelect()
            ->joinLeft(
                ['promotion_promotion_group_relation' => $tableName],
                'main_table.promotion_id = promotion_promotion_group_relation.promotion_id',
                "promotion_group_id"
            )
            ->joinLeft(
                ['promotion_group' => $collection->getTable(\Andrewprofile\Promotion\Model\ResourceModel\PromotionGroup::TABLE_NAME)],
                'promotion_promotion_group_relation.promotion_group_id = promotion_group.promotion_group_id',
                [
                    'promotion_group_name' => 'promotion_group.name',
                    'promotion_group_created_at' => 'promotion_group.created_at',
                    'promotion_group_updated_at' => 'promotion_group.updated_at'
                ]
            )->group(['promotion_promotion_group_relation.promotion_id']);

        return $collection->getData();
    }

    public function delete(PromotionGroupPromotionInterface $relation): bool
    {
        try {
            $this->resource->delete($relation);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    public function deleteById(int $promotionId, int $promotionGroupId): bool
    {
        try {
            $this->promotionGroupPromotionCollectionFactory->create()
                ->addFieldToFilter(PromotionGroupPromotionInterface::PROMOTION_ID, $promotionId)
                ->addFieldToFilter(PromotionGroupPromotionInterface::PROMOTION_GROUP_ID, $promotionGroupId)
                ->walk('delete');

            return true;
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
    }
}

