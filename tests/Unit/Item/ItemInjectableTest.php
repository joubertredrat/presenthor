<?php

declare(strict_types=1);

namespace Tests\Unit\Item;

use PHPUnit\Framework\TestCase;
use RedRat\Presenthor\Item\DataItemInterface;
use RedRat\Presenthor\Item\ItemInjectableInterface;
use RedRat\Presenthor\Item\ItemInjectableTrait;

/**
 * ItemInjectable Test
 *
 * @package Tests\Unit\Item
 */
class ItemInjectableTest extends TestCase
{
    /**
     * @return void
     */
    public function testOutputItem(): void
    {
        $arrayData = [
            'string' => 'foo',
            'number' => 10,
            'bool' => true,
            'null', null,
        ];

        $itemInjectable = self::getItemInjectableMock($arrayData);

        self::assertInstanceOf(ItemInjectableInterface::class, $itemInjectable);
        self::assertEquals($arrayData, $itemInjectable->toArray());
        self::assertEquals(\json_encode($arrayData), $itemInjectable->toJson());
    }

    /**
     * @return void
     */
    public function testGetDataItem(): void
    {
        $itemInjectable = self::getItemInjectableMock([]);
        $dataItem = self::getDataItemMock([]);
        $response = $itemInjectable->setDataItem($dataItem);

        self::assertNull($response);
    }

    /**
     * @return void
     */
    public function testSetDataItem(): void
    {
        $itemInjectable = self::getItemInjectableMock([]);
        self::assertInstanceOf(DataItemInterface::class, $itemInjectable->getDataItem());
    }

    /**
     * @param array $arrayData
     * @return ItemInjectableInterface
     */
    public static function getItemInjectableMock(array $arrayData): ItemInjectableInterface
    {
        $dataItem = self::getDataItemMock($arrayData);

        return new class($dataItem) implements ItemInjectableInterface
        {
            use ItemInjectableTrait;

            /**
             * {@inheritDoc}
             */
            public function toArray(): array
            {
                return $this
                    ->dataItem
                    ->getArrayData()
                ;
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

    /**
     * @param array $arrayData
     * @return DataItemInterface
     */
    public static function getDataItemMock(array $arrayData): DataItemInterface
    {
        return new class($arrayData) implements DataItemInterface
        {
            /**
             * @var array
             */
            private $arrayData;

            /**
             *  constructor
             *
             * @param array $arrayData
             */
            public function __construct(array $arrayData)
            {
                $this->arrayData = $arrayData;
            }

            /**
             * @return array
             */
            public function getArrayData(): array
            {
                return $this->arrayData;
            }
        };
    }
}
