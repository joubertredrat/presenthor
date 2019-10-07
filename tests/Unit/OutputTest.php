<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

/**
 * Output Test
 *
 * @package Tests\Unit
 */
class OutputTest extends TestCase
{
    /**
     * @return void
     */
    public function testOutputObject(): void
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
