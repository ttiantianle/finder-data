<?php

namespace DataRangers\Model\Message\Saas;

class Attribution implements \JsonSerializable
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var
     */
    private $value;
    /**
     * @var string
     */
    private $operation;

    public function __construct($name, $value, $operation)
    {
        $this->name = $name;
        $this->value = $value;
        $this->operation = $operation;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue(mixed $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getOperation(): string
    {
        return $this->operation;
    }

    /**
     * @param string $operation
     */
    public function setOperation(string $operation)
    {
        $this->operation = $operation;
    }


    public function jsonSerialize()
    {
        $data = [];
        if ($this->name != null) {
            $data["name"] = $this->name;
        }
        if ($this->value != null) {
            $data["value"] = $this->value;
        }
        if ($this->operation != null) {
            $data["operation"] = $this->operation;
        }
        return $data;
    }
}