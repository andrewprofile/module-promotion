<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Api\Data;

interface PromotionGroupPromotionSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Promotion_Group_Promotion list.
     * @return \Andrewprofile\Promotion\Api\Data\PromotionGroupPromotionInterface[]
     */
    public function getItems();

    /**
     * Set promotion_id list.
     * @param \Andrewprofile\Promotion\Api\Data\PromotionGroupPromotionInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

