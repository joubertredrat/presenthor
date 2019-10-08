<?php

declare(strict_types=1);

namespace Tests\Unit\Item;

use PHPUnit\Framework\TestCase;
use RedRat\Presenthor\Item\DataItemInterface;

/**
 * DataItem Test
 *
 * @package Tests\Unit\Item
 */
class DataItemTest extends TestCase
{
    /**
     * @return void
     */
    public function testInstanceOf(): void
    {
        $dataItem = self::getItemObject();

        self::assertInstanceOf(DataItemInterface::class, $dataItem);
    }

    /**
     * @return DataItemInterface
     */
    public static function getItemObject(): DataItemInterface
    {
        return new class implements DataItemInterface
        {

        };
    }
}
