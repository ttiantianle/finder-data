<?php

namespace DataRangers\Event\Custom;
/**
 * 通用参数，当上报多个实践时，其中都包含一些通用的信息时，继承此类实现
 * Class FinderGeneralParams
 * @package DataRangers\Event\Custom
 */
abstract class FinderGeneralParams
{
    abstract public function getData(): array;
}