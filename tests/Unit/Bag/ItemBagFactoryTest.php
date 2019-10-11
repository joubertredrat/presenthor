<?php

declare(strict_types=1);

namespace Tests\Unit\Bag;

use PHPUnit\Framework\TestCase;
use RedRat\Presenthor\Bag\ItemBagFactory;
use RedRat\Presenthor\Bag\ItemBagInterface;
use RedRat\Presenthor\Item\ItemInterface;

/**
 * ItemBagFactory Test
 *
 * @package Tests\Unit\Bag
 */
class ItemBagFactoryTest extends TestCase
{
    /**
     * @return void
     */
    public function testCreateUnique(): void
    {
        $item1 = self::getItemMock(['foo' => 'bar']);
        $item2 = self::getItemMock(['baz' => 'qux']);
        $item3 = self::getItemMock(['quux' => 'quuz']);

        $items = [$item1, $item2, $item1, $item3, $item3];

        $itemBag = ItemBagFactory::createUnique($items);

        self::assertInstanceOf(ItemBagInterface::class, $itemBag);
        self::assertCount(3, $itemBag);
        self::assertEquals(3, $itemBag->countItems());
    }

    /**
     * @return void
     */
    public function testCreateDuplicated(): void
    {
        $item1 = self::getItemMock(['foo' => 'bar']);
        $item2 = self::getItemMock(['baz' => 'qux']);
        $item3 = self::getItemMock(['quux' => 'quuz']);

        $items = [$item1, $item2, $item1, $item3, $item3];

        $itemBag = ItemBagFactory::createDuplicated($items);

        self::assertInstanceOf(ItemBagInterface::class, $itemBag);
        self::assertCount(5, $itemBag);
        self::assertEquals(5, $itemBag->countItems());
    }

    /**
     * @param array $arrayData
     * @return ItemInterface
     */
    public static function getItemMock(array $arrayData): ItemInterface
    {
        return new class($arrayData) implements ItemInterface
        {
            /**
             * @var array
             */
            private $arrayData;

            /**
             * Constructor
             *
             * @param array $arrayData
             */
            public function __construct(array $arrayData)
            {
                $this->arrayData = $arrayData;
            }

            /**
             * {@inheritDoc}
             */
            public function toArray(): array
            {
                return $this->arrayData;
            }

            /**
             * {@inheritDoc}
             */
            public function toJson(): string
            {
                return \json_encode($this->toArray());
            }
        };
    }
}
