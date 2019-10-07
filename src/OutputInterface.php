<?php

declare(strict_types=1);

namespace RedRat\Presenthor;

/**
 * Output Interface
 *
 * @package RedRat\Presenthor
 */
interface OutputInterface
{
    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return string
     */
    public function toJson(): string;
}
