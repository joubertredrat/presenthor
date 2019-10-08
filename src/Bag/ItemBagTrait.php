<?php

declare(strict_types=1);

namespace RedRat\Presenthor\Bag;

use RedRat\Presenthor\Item\ItemInterface;

/**
 * Item Bag Trait
 *
 * @package RedRat\Bag
 */
trait ItemBagTrait
{
    /**
     * @var ItemInterface[]
     */
    private $items;

    /**
     * Item Bag Trait constructor
     */
    public function __construct()
    {
        $this->items = [];
    }

    /**
     * {@inheritDoc}
     */
    public function addItem(ItemInterface $item, bool $acceptDuplicate = false): bool
    {
        if ($this->hasItem($item) && !$acceptDuplicate) {
            return false;
        }

        $this->items[] = $item;
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function hasItem(ItemInterface $item): bool
    {
        return \in_array($item, $this->items);
    }

    /**
     * {@inheritDoc}
     */
    public function removeItem(ItemInterface $item): bool
    {
        if (!$this->hasItem($item)) {
            return false;
        }

        $itemKey = \array_search($item, $this->items);
        unset($this->items[$itemKey]);
        
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getItemsList(): array
    {
        return $this->items;
    }

    /**
     * {@inheritDoc}
     */
    public function clearItems(): void
    {
        $this->items = [];
    }

    /**
     * {@inheritDoc}
     */
    public function countItems(): int
    {
        return \count($this->items);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return $this->countItems();
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        $returnData = [];

        foreach ($this->items as $item) {
            $returnData[] = $item->toArray();
        }

        return $returnData;
    }

    /**
     * {@inheritDoc}
     */
    public function toJson(): string
    {
        return \json_encode($this->toArray());
    }
}
