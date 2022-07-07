<?php
require "../vendor/autoload.php";

use DataRangers\Event\Custom\TestDeviceParams;
use DataRangers\Event\TestOpenLiveEvent;
use DataRangers\FinderManager;

$finderManager = FinderManager::getInstance('XXXXXXXXX', 'XXXXXXXXXXXX', 'XXXXXXXXX');

// 使用通用参数
$finderManager->setCustom((new TestDeviceParams('asdsads1231', 'IOS')));
$openLiveEvent = new TestOpenLiveEvent(12312313, 'sn_test_12312313', 45752749, 'video');
try {
    $finderManager->sendEvent(45752749, $openLiveEvent);
} catch (Exception $e) {

}
