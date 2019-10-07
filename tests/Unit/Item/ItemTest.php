<?php

declare(strict_types=1);

namespace Tests\Unit\Item;

use PHPUnit\Framework\TestCase;

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

        self::assertEquals($arrayData, null);
        self::assertEquals(\json_encode($arrayData), null);
    }
}
