<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Model\ResourceModel\PromotionGroupPromotion;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'promotion_group_promotion_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Andrewprofile\Promotion\Model\PromotionGroupPromotion::class,
            \Andrewprofile\Promotion\Model\ResourceModel\PromotionGroupPromotion::class
        );
    }
}

