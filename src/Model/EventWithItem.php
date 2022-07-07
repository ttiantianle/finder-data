<?php

namespace DataRangers\Model;

class EventWithItem implements \JsonSerializable
{
    /**
     * @var string
     */
    private $itemName;
    /**
     * @var array
     */
    private $itemIds;

    /**
     * @return string
     */
    public function getItemName(): string
    {
        return $this->itemName;
    }

    /**
     * @param string $itemName
     */
    public function setItemName(string $itemName)
    {
        $this->itemName = $itemName;
    }

    /**
     * @return array
     */
    public function getItemIds(): array
    {
        return $this->itemIds;
    }

    /**
     * @param array $itemIds
     */
    public function setItemIds(array $itemIds)
    {
        $this->itemIds = $itemIds;
    }

    public function jsonSerialize()
    {
        $data = [];
        $data[$this->itemName] = array_values($this->itemIds);
        return $data;
    }
}