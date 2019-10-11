<?php

declare(strict_types=1);

namespace RedRat\Presenthor\Bag;

use RedRat\Presenthor\Item\ItemInterface;

/**
 * ItemBag Factory
 *
 * @package RedRat\Presenthor\Bag
 */
class ItemBagFactory
{
    /**
     * @param array $items
     * @return ItemBagInterface
     */
    public static function createUnique(array $items): ItemBagInterface
    {
        return self::create($items, false);
    }

    /**
     * @param array $items
     * @return ItemBagInterface
     */
    public static function createDuplicated(array $items): ItemBagInterface
    {
        return self::create($items, true);
    }

    /**
     * @param array $items
     * @param bool $acceptDuplicate
     * @return ItemBagInterface
     */
    protected static function create(array $items, bool $acceptDuplicate): ItemBagInterface
    {
        $itemBag = new ItemBag();

        /** @var ItemInterface $item */
        foreach ($items as $item) {
            if ($item instanceof ItemInterface) {
                $itemBag->addItem($item, $acceptDuplicate);
            }
        }

        return $itemBag;
    }
}
