<?php

declare(strict_types=1);

namespace Tests\Unit\Bag;

use PHPUnit\Framework\TestCase;
use RedRat\Presenthor\Bag\ItemBag;
use RedRat\Presenthor\Item\ItemInterface;

/**
 * Item Bag Test
 *
 * @package Tests\Unit\Bag
 */
class ItemBagTest extends TestCase
{
    /**
     * @return void
     */
    public function testAddNonDuplicatedItem(): void
    {
        $item1 = self::getItemMock(['foo' => 'bar']);
        $item2 = self::getItemMock(['baz' => 'qux']);

        $itemBag = new ItemBag();
        $response1 = $itemBag->addItem($item1);
        $response2 = $itemBag->addItem($item1);
        $response3 = $itemBag->addItem($item2);

        self::assertTrue($response1);
        self::assertFalse($response2);
        self::assertTrue($response3);
        self::assertCount(2, $itemBag);
    }

    /**
     * @return void
     */
    public function testAddDuplicatedItem(): void
    {
        $item1 = self::getItemMock(['foo' => 'bar']);
        $item2 = self::getItemMock(['baz' => 'qux']);

        $itemBag = new ItemBag();
        $response1 = $itemBag->addItem($item1, true);
        $response2 = $itemBag->addItem($item1, true);
        $response3 = $itemBag->addItem($item2, true);

        self::assertTrue($response1);
        self::assertTrue($response2);
        self::assertTrue($response3);
        self::assertCount(3, $itemBag);
    }

    /**
     * @return void
     */
    public function testHasItem(): void
    {
        $item1 = self::getItemMock(['foo' => 'bar']);

        $itemBag = new ItemBag();
        $itemBag->addItem($item1);
        $response = $itemBag->hasItem($item1);

        self::assertTrue($response);
    }

    /**
     * @return void
     */
    public function testHasNotItem(): void
    {
        $item1 = self::getItemMock(['foo' => 'bar']);

        $itemBag = new ItemBag();
        $response = $itemBag->hasItem($item1);

        self::assertFalse($response);
    }

    /**
     * @return void
     */
    public function testRemoveItem(): void
    {
        $item = self::getItemMock(['baz' => 'qux']);

        $itemBag = new ItemBag();
        $itemBag->addItem(self::getItemMock(['foo' => 'bar']));
        $itemBag->addItem($item);
        $itemBag->addItem(self::getItemMock(['quux' => 'quuz']));
        $response = $itemBag->removeItem($item);

        self::assertTrue($response);
        self::assertCount(2, $itemBag);
        self::assertEquals(2, $itemBag->countItems());
    }

    /**
     * @return void
     */
    public function testRemoveItemNotExists(): void
    {
        $item = self::getItemMock(['quux' => 'quuz']);

        $itemBag = new ItemBag();
        $itemBag->addItem(self::getItemMock(['foo' => 'bar']));
        $itemBag->addItem(self::getItemMock(['baz' => 'qux']));
        $response = $itemBag->removeItem($item);

        self::assertFalse($response);
        self::assertCount(2, $itemBag);
        self::assertEquals(2, $itemBag->countItems());
    }

    /**
     * @return void
     */
    public function testGetItemsList(): void
    {
        $item1 = self::getItemMock(['foo_foo' => 'bar_bar']);
        $item2 = self::getItemMock(['baz_baz' => 'qux_qux']);

        $itemBag = new ItemBag();
        $itemBag->addItem($item1);
        $itemBag->addItem($item2);


        self::assertEquals([$item1, $item2], $itemBag->getItemsList());
    }

    /**
     * @return void
     */
    public function testClearList(): void
    {
        $itemBag = new ItemBag();
        $itemBag->addItem(self::getItemMock(['foo' => 'bar']));
        $itemBag->addItem(self::getItemMock(['baz' => 'qux']));
        $itemBag->clearItems();

        self::assertCount(0, $itemBag);
        self::assertEquals(0, $itemBag->countItems());
    }

    /**
     * @return void
     */
    public function testCountNonDuplicatedItems(): void
    {
        $item1 = self::getItemMock(['foo' => 'bar']);
        $item2 = self::getItemMock(['baz' => 'qux']);

        $itemBag = new ItemBag();
        $itemBag->addItem($item1);
        $itemBag->addItem($item1);
        $itemBag->addItem($item2);

        self::assertCount(2, $itemBag);
        self::assertEquals(2, $itemBag->countItems());
    }

    /**
     * @return void
     */
    public function testCountDuplicatedItems(): void
    {
        $item1 = self::getItemMock(['foo' => 'bar']);
        $item2 = self::getItemMock(['baz' => 'qux']);

        $itemBag = new ItemBag();
        $itemBag->addItem($item1, true);
        $itemBag->addItem($item1, true);
        $itemBag->addItem($item2, true);

        self::assertCount(3, $itemBag);
        self::assertEquals(3, $itemBag->countItems());
    }

    /**
     * @return void
     */
    public function testOutputData(): void
    {
        $item1Data = [
            'foo' => 'bar',
        ];

        $item2Data = [
            'baz' => 'qux',
        ];

        $item1 = self::getItemMock($item1Data);
        $item2 = self::getItemMock($item2Data);

        $itemBag = new ItemBag();
        $itemBag->addItem($item1);
        $itemBag->addItem($item2);

        self::assertEquals([$item1Data, $item2Data], $itemBag->toArray());
        self::assertEquals(\json_encode([$item1Data, $item2Data]), $itemBag->toJson());
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
