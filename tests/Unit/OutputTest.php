<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use RedRat\Presenthor\OutputInterface;

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

        $output = self::getObjectMock($arrayData);

        self::assertEquals($arrayData, $output->toArray());
        self::assertEquals(\json_encode($arrayData), $output->toJson());
    }

    /**
     * @param array $arrayData
     * @return OutputInterface
     */
    public static function getObjectMock(array $arrayData): OutputInterface
    {
        return new class($arrayData) implements OutputInterface
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
