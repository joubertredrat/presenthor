<?php

declare(strict_types=1);

namespace RedRat\Presenthor\Item;

/**
 * ItemInjectable Trait
 *
 * @package RedRat\Presenthor\Item
 */
trait ItemInjectableTrait
{
    /**
     * @var DataItemInterface
     */
    protected $dataItem;

    /**
     * ItemInjectable Trait constructor
     *
     * @param DataItemInterface $dataItem
     */
    public function __construct(DataItemInterface $dataItem)
    {
        $this->dataItem = $dataItem;
    }

    /**
     * @return DataItemInterface
     */
    public function getDataItem(): DataItemInterface
    {
        return $this->dataItem;
    }

    /**
     * @param DataItemInterface $dataItem
     * @return void
     */
    public function setDataItem(DataItemInterface $dataItem): void
    {
        $this->dataItem = $dataItem;
    }
}
