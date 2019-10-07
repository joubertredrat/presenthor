<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

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
        self::assertInstanceOf(PresenterDataItemInterface::class, null);
    }
}
