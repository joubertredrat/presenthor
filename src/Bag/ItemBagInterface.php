<?php

declare(strict_types=1);

namespace RedRat\Presenthor\Bag;

use RedRat\Presenthor\Item\ItemInterface;
use RedRat\Presenthor\OutputInterface;

/**
 * Item Bag Interface
 *
 * @package RedRat\Bag
 */
interface ItemBagInterface extends OutputInterface, \Countable
{
    /**
     * @param ItemInterface $item
     * @param bool $acceptDuplicate
     * @return bool
     */
    public function addItem(ItemInterface $item, bool $acceptDuplicate = false): bool;

    /**
     * @param ItemInterface $item
     * @return bool
     */
    public function hasItem(ItemInterface $item): bool;

    /**
     * @param ItemInterface $item
     * @return bool
     */
    public function removeItem(ItemInterface $item): bool;

    /**
     * @return ItemInterface[]
     */
    public function getItemsList(): array;

    /**
     * @return void
     */
    public function clearItems(): void;

    /**
     * @return int
     */
    public function countItems(): int;
}
