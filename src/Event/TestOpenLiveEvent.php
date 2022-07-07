<?php

namespace DataRangers\Event;
/**
 * @notes: event示例
 * @class：TestOpenLiveEvent
 * @package: DataRangers\Event
 * @author: tianshaoteng-hj
 * @time: 2022.7.7
 */
class TestOpenLiveEvent extends FinderEvent
{
    /**
     * @var int
     */
    private $liveId;
    /**
     * @var string
     */
    private $sn;
    /**
     * @var int
     */
    private $uid;
    /**
     * @var string
     */
    private $mode;

    /**
     * @param int $liveId
     * @param string $sn
     * @param int $uid
     * @param string $mode
     */
    public function __construct(int $liveId, string $sn, int $uid, string $mode)
    {
        $this->liveId = $liveId;
        $this->sn = $sn;
        $this->uid = $uid;
        $this->mode = $mode;
    }


    /**
     * @return int
     */
    public function getLiveId(): int
    {
        return $this->liveId;
    }

    /**
     * @param int $liveId
     */
    public function setLiveId(int $liveId)
    {
        $this->liveId = $liveId;
    }

    /**
     * @return string
     */
    public function getSn(): string
    {
        return $this->sn;
    }

    /**
     * @param string $sn
     */
    public function setSn(string $sn)
    {
        $this->sn = $sn;
    }

    /**
     * @return int
     */
    public function getUid(): int
    {
        return $this->uid;
    }

    /**
     * @param int $uid
     */
    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     */
    public function setMode(string $mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'live_id' => $this->getLiveId(),
            'mode' => $this->getMode(),
            'sn' => $this->getSn(),
            'uid' => $this->getUid(),
        ];
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return 'open_live';
    }
}