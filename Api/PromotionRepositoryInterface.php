<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface PromotionRepositoryInterface
{

    /**
     * Save Promotion
     * @param \Andrewprofile\Promotion\Api\Data\PromotionInterface $promotion
     * @return \Andrewprofile\Promotion\Api\Data\PromotionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Andrewprofile\Promotion\Api\Data\PromotionInterface $promotion
    );

    /**
     * Retrieve Promotion
     * @param string $promotionId
     * @return \Andrewprofile\Promotion\Api\Data\PromotionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($promotionId);

    /**
     * Retrieve Promotion matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Andrewprofile\Promotion\Api\Data\PromotionSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Promotion
     * @param \Andrewprofile\Promotion\Api\Data\PromotionInterface $promotion
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Andrewprofile\Promotion\Api\Data\PromotionInterface $promotion
    );

    /**
     * Delete Promotion by ID
     * @param string $promotionId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($promotionId);
}

