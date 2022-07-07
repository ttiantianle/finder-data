<?php

namespace DataRangers;

use DataRangers\Event\Custom\FinderGeneralParams;
use Exception;
use DataRangers\Event\FinderEvent;

class FinderManager
{
    private static $instance = null;

    /**
     * 事件通用属性
     * @var FinderGeneralParams
     */
    private $custom;
    /**
     * @var string
     */
    private $domain;
    /**
     * @var string
     */
    private $host;
    /**
     * @var string
     */
    private $appid;

    private function __construct(string $domain, string $host, string $appId)
    {
        $this->domain = $domain;
        $this->host = $host;
        $this->appid = $appId;
    }

    /**
     * @param string $domain
     * @param string $host
     * @param string $appId
     * @return FinderManager
     */
    public static function getInstance(string $domain, string $host, string $appId): FinderManager
    {
        return self::$instance ?? new self($domain, $host, $appId);
    }

    /**
     * @param FinderGeneralParams $finderGeneralParams
     */
    public function setCustom(FinderGeneralParams $finderGeneralParams)
    {
        $this->custom = $finderGeneralParams;
    }

    /**
     * 上报事件
     * @param $userId
     * @param FinderEvent ...$finderEvents
     * @throws RangersSDKException
     */
    public function sendEvent($userId, FinderEvent ...$finderEvents)
    {
        $eventNames = [];
        $params = [];
        foreach ($finderEvents as $finderEvent) {
            $params[] = $finderEvent->getData();
            $eventNames[] = $finderEvent->getEventName();
        }
        $this->initCollector();
        $rc = new AppEventCollector();
        $custom = $this->custom ? $this->custom->getData() : null;
        $rc->sendEvent($userId, $this->appid, $custom, $eventNames, $params);

    }

    /**
     * 初始化配置
     * @throws RangersSDKException
     */
    private function initCollector()
    {
        CollectorConfig::init_datarangers_collector([
            "domain" => $this->domain,
            "save" => false,
            'send' => true,
            'headers' => [
                'Host' => $this->host,
                'Content-type' => 'application/json'
            ]
        ]);
    }
}