<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Api\Data;

interface PromotionGroupSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Promotion_Group list.
     * @return \Andrewprofile\Promotion\Api\Data\PromotionGroupInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Andrewprofile\Promotion\Api\Data\PromotionGroupInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

