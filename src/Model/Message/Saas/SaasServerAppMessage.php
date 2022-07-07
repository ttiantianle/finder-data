<?php

namespace DataRangers\Model\Message\Saas;

use DataRangers\Model\Header;
use DataRangers\Model\Message\Message;
use DataRangers\Model\SaasServerEvent;
use DataRangers\Model\User;
use JsonSerializable;

class SaasServerAppMessage implements JsonSerializable
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Header
     */
    private $header;
    /**
     * @var array
     */
    private $events;

    public function __construct(Message $message)
    {
        $this->user = new User();
        $this->events = array();
        $appMessage = $message->getAppMessage();

        $this->getUser()->setUserUniqueId($appMessage->getUserUniqueId());
        $this->setHeader($appMessage->getHeader());
        $events = $appMessage->getEventV3();
        if (!empty($events)) {
            foreach ($events as $event) {
                $sse = new SaasServerEvent($event);
                $this->events[] = $sse;
            }
        }
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return Header
     */
    public function getHeader(): Header
    {
        return $this->header;
    }

    /**
     * @param Header $header
     */
    public function setHeader(Header $header)
    {
        $this->header = $header;
    }

    /**
     * @return array
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @param array $events
     */
    public function setEvents(array $events)
    {
        $this->events = $events;
    }

    public function jsonSerialize()
    {
        $data = [];
        $data["user"] = $this->user;
        $data["header"] = $this->header;
        $data["events"] = $this->events;
        return $data;
    }
}