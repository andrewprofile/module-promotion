<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Model\ResourceModel\PromotionGroup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'promotion_group_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Andrewprofile\Promotion\Model\PromotionGroup::class,
            \Andrewprofile\Promotion\Model\ResourceModel\PromotionGroup::class
        );
    }
}

