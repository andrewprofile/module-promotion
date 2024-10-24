<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface PromotionGroupRepositoryInterface
{

    /**
     * Save Promotion_Group
     * @param \Andrewprofile\Promotion\Api\Data\PromotionGroupInterface $promotionGroup
     * @return \Andrewprofile\Promotion\Api\Data\PromotionGroupInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Andrewprofile\Promotion\Api\Data\PromotionGroupInterface $promotionGroup
    );

    /**
     * Retrieve Promotion_Group
     * @param string $promotionGroupId
     * @return \Andrewprofile\Promotion\Api\Data\PromotionGroupInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($promotionGroupId);

    /**
     * Retrieve Promotion_Group matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Andrewprofile\Promotion\Api\Data\PromotionGroupSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Promotion_Group
     * @param \Andrewprofile\Promotion\Api\Data\PromotionGroupInterface $promotionGroup
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Andrewprofile\Promotion\Api\Data\PromotionGroupInterface $promotionGroup
    );

    /**
     * Delete Promotion_Group by ID
     * @param string $promotionGroupId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($promotionGroupId);
}

