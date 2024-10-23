<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Model\ResourceModel\Promotion;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'promotion_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Andrewprofile\Promotion\Model\Promotion::class,
            \Andrewprofile\Promotion\Model\ResourceModel\Promotion::class
        );
    }
}

