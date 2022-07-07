<?php

namespace DataRangers\Model;

class User implements \JsonSerializable
{
    /**
     * @var String
     */
    private $userUniqueId;

    /**
     * @return String
     */
    public function getUserUniqueId(): string
    {
        return $this->userUniqueId;
    }

    /**
     * @param String $userUniqueId
     */
    public function setUserUniqueId(string $userUniqueId)
    {
        $this->userUniqueId = $userUniqueId;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $data = [];
        if ($this->userUniqueId != null) $data["user_unique_id"] = $this->userUniqueId;
        return $data;
    }
}