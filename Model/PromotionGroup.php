<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Model;

use Andrewprofile\Promotion\Api\Data\PromotionGroupInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\DateTime;

class PromotionGroup extends AbstractModel implements PromotionGroupInterface
{
    /**
     * @var DateTime
     */
    private $dateTime;

    /**
     * @param Context $context
     * @param Registry $registry
     * @param DateTime $dateTime
     */
    public function __construct(
        Context  $context,
        Registry $registry,
        DateTime $dateTime
    )
    {
        $this->dateTime = $dateTime;
        parent::__construct($context, $registry);
    }

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        try {
            $this->_init(ResourceModel\PromotionGroup::class);
        }
        catch (\Exception $e) {}
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

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @return PromotionGroup
     */
    public function beforeSave()
    {
        parent::beforeSave();
        if ($this->isObjectNew() && !$this->getCreatedAt()) {
            $this->setCreatedAt($this->dateTime->formatDate(true));
        }
        $this->setUpdatedAt($this->dateTime->formatDate(true));

        return $this;
    }
}

