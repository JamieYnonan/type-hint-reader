<?php

namespace Thr;

/**
 * Class OnlySetterParameters
 * @package Thr
 */
class OnlySetterParameters
{
    private $int;
    private $integer;
    private $float;
    private $array;
    private $dateTime;
    private $onlySetterParameters;
    private $mixed;

    /**
     * @param int $int
     */
    public function setInt(int $int): void
    {
        $this->int = $int;
    }

    /**
     * @param int $integer
     */
    public function setInteger(\integer $integer): void
    {
        $this->integer = $integer;
    }

    /**
     * @param float $float
     */
    public function setFloat(float $float): void
    {
        $this->float = $float;
    }

    /**
     * @param array $array
     */
    public function setArray(?array $array): void
    {
        $this->array = $array;
    }

    /**
     * @param \DateTime $dateTime
     */
    public function setDateTime(\DateTime $dateTime): void
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @param OnlySetterParameters $onlySetterParameters
     */
    public function setOnlySetterParameters(OnlySetterParameters $onlySetterParameters): void
    {
        $this->onlySetterParameters = $onlySetterParameters;
    }

    /**
     * @param mixed $mixed
     */
    public function setMixed($mixed): void
    {
        $this->mixed = $mixed;
    }
}
