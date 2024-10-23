<?php
declare(strict_types=1);

namespace Andrewprofile\Promotion\Api\Data;

interface PromotionSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Promotion list.
     * @return \Andrewprofile\Promotion\Api\Data\PromotionInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Andrewprofile\Promotion\Api\Data\PromotionInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

