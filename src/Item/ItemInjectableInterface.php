<?php

declare(strict_types=1);

namespace RedRat\Presenthor\Item;

/**
 * ItemInjectable Interface
 *
 * @package RedRat\Presenthor\Item
 */
interface ItemInjectableInterface extends ItemInterface
{
    /**
     * ItemInjectable Interface constructor
     *
     * @param DataItemInterface $dataItem
     */
    public function __construct(DataItemInterface $dataItem);

    /**
     * @return DataItemInterface
     */
    public function getDataItem(): DataItemInterface;

    /**
     * @param DataItemInterface $dataItem
     * @return void
     */
    public function setDataItem(DataItemInterface $dataItem): void;
}
