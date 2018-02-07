<?php

namespace Thr;

class OnlyConstructorParameters
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
     * @var OnlyConstructorParameters
     */
    private $onlyConstructorParameters;

    /**
     * @var mixed
     */
    private $mixed;

    /**
     * OnlyConstructorParameters constructor.
     * @param int|null $int
     * @param int $integer
     * @param float $float
     * @param array $array
     * @param object $object
     * @param \DateTime $dateTime
     * @param null|OnlyConstructorParameters $onlyConstructorParameters
     * @param $mixed
     */
    private function __construct(
        ?int $int,
        \integer $integer,
        float $float,
        array $array,
        \object $object,
        \DateTime $dateTime,
        ?OnlyConstructorParameters $onlyConstructorParameters,
        $mixed
    ) {
        $this->int = $int;
        $this->integer = $integer;
        $this->float = $float;
        $this->array = $array;
        $this->object = $object;
        $this->dateTime = $dateTime;
        $this->onlyConstructorParameters = $onlyConstructorParameters;
        $this->mixed = $mixed;
    }
}