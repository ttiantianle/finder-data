<?php

namespace DataRangers\Model;

class SaasServerEvent implements \JsonSerializable
{
    /**
     * @var string
     */
    private $event;
    /**
     * @var string
     */
    private $params;
    /**
     * @var string|null
     */
    private $sessionId;
    /**
     * @var int
     */
    private $localTimeMs;
    /**
     * @var string
     */
    private $datetime;
    /**
     * @var string|null
     */
    private $abSdkVersion;

    public function __construct(Event $event)
    {
        $this->setEvent($event->getEvent());
        $params = $event->getParams();
        if ($event->getItems() != null) {
            $params['__items'] = array_values($event->getItems());
        }
        if ($params != null) {
            $this->setParams(json_encode($params));
        }
        $this->setSessionId($event->getSessionId());
        $this->setLocalTimeMs($event->getLocalTimeMs());
        $this->setDatetime($event->getDateTime());
        $this->setAbSdkVersion($event->getAbSdkVersion());
    }

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @param string $event
     */
    public function setEvent(string $event)
    {
        $this->event = $event;
    }

    /**
     * @return string
     */
    public function getParams(): string
    {
        return $this->params;
    }

    /**
     * @param string $params
     */
    public function setParams(string $params)
    {
        $this->params = $params;
    }

    /**
     * @return string|null
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param string|null $sessionId
     * @return void
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    /**
     * @return int
     */
    public function getLocalTimeMs(): int
    {
        return $this->localTimeMs;
    }

    /**
     * @param int $localTimeMs
     */
    public function setLocalTimeMs(int $localTimeMs)
    {
        $this->localTimeMs = $localTimeMs;
    }

    /**
     * @return string
     */
    public function getDatetime(): string
    {
        return $this->datetime;
    }

    /**
     * @param string $datetime
     */
    public function setDatetime(string $datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return string|null
     */
    public function getAbSdkVersion()
    {
        return $this->abSdkVersion;
    }

    /**
     * @param string|null $abSdkVersion
     * @return void
     */
    public function setAbSdkVersion($abSdkVersion)
    {
        $this->abSdkVersion = $abSdkVersion;
    }


    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
        $data = [];
        if ($this->event != null) {
            $data["event"] = $this->event;
        }
        if ($this->params != null) {
            $data["params"] = $this->params;
        }
        if ($this->sessionId != null) {
            $data["session_id"] = $this->sessionId;
        }
        if ($this->localTimeMs != null) {
            $data["local_time_ms"] = $this->localTimeMs;
        }
        if ($this->datetime != null) {
            $data["datatime"] = $this->datetime;
        }
        if ($this->abSdkVersion != null) {
            $data["ab_sdk_version"] = $this->abSdkVersion;
        }

        return $data;
    }
}