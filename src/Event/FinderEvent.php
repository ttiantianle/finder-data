<?php

namespace DataRangers\Event;
/**
 * @notes: 抽象事件类，所有事件都应该继承此类
 * @class：FinderEvent
 * @package: DataRangers\Event
 * @author: tianshaoteng-hj
 * @time: 2022.7.7
 */
abstract class FinderEvent
{
    /**
     * 打点事件类型
     * @return string
     */
    abstract public function getEventName(): string;


    abstract public function getData(): array;
}