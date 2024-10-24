<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Model;

use Andrewprofile\Promotion\Api\Data\PromotionGroupPromotionInterface;
use Magento\Framework\Model\AbstractModel;

class PromotionGroupPromotion extends AbstractModel implements PromotionGroupPromotionInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(ResourceModel\PromotionGroupPromotion::class);
    }

    /**
     * @inheritDoc
     */
    public function getPromotionGroupPromotionId()
    {
        return $this->getData(self::PROMOTION_GROUP_PROMOTION_ID);
    }

    /**
     * @inheritDoc
     */
    public function setPromotionGroupPromotionId($promotionGroupPromotionId)
    {
        return $this->setData(self::PROMOTION_GROUP_PROMOTION_ID, $promotionGroupPromotionId);
    }

    /**
     * @inheritDoc
     */
    public function getPromotionId()
    {
        return $this->getData(self::PROMOTION_ID);
    }

    /**
     * @inheritDoc
     */
    public function setPromotionId($promotionId)
    {
        return $this->setData(self::PROMOTION_ID, $promotionId);
    }

    /**
     * @inheritDoc
     */
    public function getPromotionGroupId()
    {
        return $this->getData(self::PROMOTION_GROUP_ID);
    }

    /**
     * @inheritDoc
     */
    public function setPromotionGroupId($promotionGroupId)
    {
        return $this->setData(self::PROMOTION_GROUP_ID, $promotionGroupId);
    }
}

