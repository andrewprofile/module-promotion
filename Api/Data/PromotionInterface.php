<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Api\Data;

interface PromotionInterface
{

    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
    const NAME = 'name';
    const PROMOTION_ID = 'promotion_id';

    /**
     * Get promotion_id
     * @return int|null
     */
    public function getPromotionId();

    /**
     * Set promotion_id
     * @param int $promotionId
     * @return \Andrewprofile\Promotion\Promotion\Api\Data\PromotionInterface
     */
    public function setPromotionId($promotionId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Andrewprofile\Promotion\Promotion\Api\Data\PromotionInterface
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
     * @return \Andrewprofile\Promotion\Promotion\Api\Data\PromotionInterface
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
     * @return \Andrewprofile\Promotion\Promotion\Api\Data\PromotionInterface
     */
    public function setUpdatedAt($updatedAt);
}
