<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use RedRat\Presenthor\Item\DataItemInterface;

/**
 * Class PresenterDataItem Test
 *
 * @package Tests\Unit
 */
class PresenterDataItemTest extends TestCase
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
