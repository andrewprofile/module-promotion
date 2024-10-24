<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Api\Data;

interface PromotionGroupInterface
{

    const PROMOTION_GROUP_ID = 'promotion_group_id';
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
    const NAME = 'name';

    /**
     * Get promotion_group_id
     * @return int|null
     */
    public function getPromotionGroupId();

    /**
     * Set promotion_group_id
     * @param int $promotionGroupId
     * @return \Andrewprofile\Promotion\PromotionGroup\Api\Data\PromotionGroupInterface
     */
    public function setPromotionGroupId($promotionGroupId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Andrewprofile\Promotion\PromotionGroup\Api\Data\PromotionGroupInterface
     */
    public function setName($name);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Andrewprofile\Promotion\PromotionGroup\Api\Data\PromotionGroupInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Andrewprofile\Promotion\PromotionGroup\Api\Data\PromotionGroupInterface
     */
    public function setUpdatedAt($updatedAt);
}

