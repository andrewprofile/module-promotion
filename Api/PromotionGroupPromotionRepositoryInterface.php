<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Api;

use Andrewprofile\Promotion\Api\Data\PromotionGroupPromotionInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;

interface PromotionGroupPromotionRepositoryInterface
{
    /**
     * Create new relation
     *
     * @param int $promotionId
     * @param int $promotionGroupId
     * @return \Andrewprofile\Promotion\Api\Data\PromotionGroupPromotionInterface
     * @throws CouldNotSaveException
     */
    public function create(int $promotionId, int $promotionGroupId): PromotionGroupPromotionInterface;

    /**
     * Save relation
     *
     * @param \Andrewprofile\Promotion\Api\Data\PromotionGroupPromotionInterface $relation
     * @return \Andrewprofile\Promotion\Api\Data\PromotionGroupPromotionInterface
     * @throws CouldNotSaveException
     */
    public function save(PromotionGroupPromotionInterface $relation): PromotionGroupPromotionInterface;

    /**
     * Get related promotion group by promotion id
     *
     * @param int $promotionId
     * @return mixed[]
     */
    public function getPromotionGroupByPromotionId(int $promotionId);

    /**
     * Get related promotion by promotion group id
     *
     * @param int $promotionGroupId
     * @return mixed[]
     */
    public function getPromotionByPromotionGroupId(int $promotionGroupId);

    /**
     * Delete relation
     *
     * @param \Andrewprofile\Promotion\Api\Data\PromotionGroupPromotionInterface $relation
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(PromotionGroupPromotionInterface $relation): bool;


    /**
     * Delete relations by id
     *
     * @param int $promotionId
     * @param int $promotionGroupId
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $promotionId, int $promotionGroupId): bool;
}

