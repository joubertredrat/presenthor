<?php

declare(strict_types=1);

namespace Tests\Unit\Item;

use PHPUnit\Framework\TestCase;
use RedRat\Presenthor\Item\ItemInterface;

/**
 * Item Test
 *
 * @package Tests\Unit\Item
 */
class ItemTest extends TestCase
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

        $object = self::getObjectMock($arrayData);

        self::assertInstanceOf(ItemInterface::class, $object);
        self::assertEquals($arrayData, $object->toArray());
        self::assertEquals(\json_encode($arrayData), $object->toJson());
    }

    /**
     * @param array $arrayData
     * @return ItemInterface
     */
    public static function getObjectMock(array $arrayData): ItemInterface
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
