<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PromotionGroupPromotion extends AbstractDb
{
    const TABLE_NAME = 'andrewprofile_promotion_promotion_group_promotion';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, 'promotion_group_promotion_id');
    }
}

