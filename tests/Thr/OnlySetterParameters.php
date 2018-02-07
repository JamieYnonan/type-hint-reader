<?php

namespace Thr;

/**
 * Class OnlySetterParameters
 * @package Thr
 */
class OnlySetterParameters
{
    /**
     * @var int
     */
    private $int;

    /**
     * @var int
     */
    private $integer;

    /**
     * @var float
     */
    private $float;

    /**
     * @var array
     */
    private $array;

    /**
     * @var object
     */
    private $object;

    /**
     * @var \DateTime
     */
    private $dateTime;

    /**
     * @var OnlySetterParameters
     */
    private $onlySetterParameters;
    /**
     * @var mixed
     */
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
     * @param object $object
     */
    public function setObject(?\object $object): void
    {
        $this->object = $object;
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
