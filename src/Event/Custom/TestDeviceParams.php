<?php

namespace DataRangers\Event\Custom;

class TestDeviceParams extends FinderGeneralParams
{
    /**
     * 设备id
     * @var string
     */
    private $deviceId;
    /**
     * 手机系统
     * @var string
     */
    private $mobileSystem;

    /**
     * TestDeviceParams constructor.
     * @param string $deviceId
     * @param string $mobileSystem
     */
    public function __construct(string $deviceId, string $mobileSystem)
    {
        $this->deviceId = $deviceId;
        $this->mobileSystem = $mobileSystem;
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    /**
     * @param string $deviceId
     */
    public function setDeviceId(string $deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * @return string
     */
    public function getMobileSystem(): string
    {
        return $this->mobileSystem;
    }

    /**
     * @param string $mobileSystem
     */
    public function setMobileSystem(string $mobileSystem)
    {
        $this->mobileSystem = $mobileSystem;
    }

    public function getData(): array
    {
        return [
            'device_id' => $this->deviceId,
            'mobile_system' => $this->mobileSystem
        ];
    }
}