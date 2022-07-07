<?php

namespace DataRangers;

class OpenapiConfig
{
    /**
     * @var string
     */
    private $domain;
    /**
     * @var string
     */
    private $ak;
    /**
     * @var string
     */
    private $sk;

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function sedDomain($domain)
    {
        $this->domain = $domain;
    }

    public function getAk(): string
    {
        return $this->ak;
    }

    public function setAk($ak)
    {
        $this->ak = $ak;
    }

    /**
     * @return string
     */
    public function getSk(): string
    {
        return $this->sk;
    }

    /**
     * @param string $sk
     */
    public function setSk(string $sk)
    {
        $this->sk = $sk;
    }

}