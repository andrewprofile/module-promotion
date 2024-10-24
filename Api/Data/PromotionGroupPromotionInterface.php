<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Api\Data;

interface PromotionGroupPromotionInterface
{

    const PROMOTION_GROUP_ID = 'promotion_group_id';
    const PROMOTION_ID = 'promotion_id';
    const PROMOTION_GROUP_PROMOTION_ID = 'promotion_group_promotion_id';

    /**
     * Get promotion_group_promotion_id
     * @return int|null
     */
    public function getPromotionGroupPromotionId();

    /**
     * Set promotion_group_promotion_id
     * @param int $promotionGroupPromotionId
     * @return \Andrewprofile\Promotion\PromotionGroupPromotion\Api\Data\PromotionGroupPromotionInterface
     */
    public function setPromotionGroupPromotionId($promotionGroupPromotionId);

    /**
     * Get promotion_id
     * @return int|null
     */
    public function getPromotionId();

    /**
     * Set promotion_id
     * @param int $promotionId
     * @return \Andrewprofile\Promotion\PromotionGroupPromotion\Api\Data\PromotionGroupPromotionInterface
     */
    public function setPromotionId($promotionId);

    /**
     * Get promotion_group_id
     * @return int|null
     */
    public function getPromotionGroupId();

    /**
     * Set promotion_group_id
     * @param int $promotionGroupId
     * @return \Andrewprofile\Promotion\PromotionGroupPromotion\Api\Data\PromotionGroupPromotionInterface
     */
    public function setPromotionGroupId($promotionGroupId);
}

