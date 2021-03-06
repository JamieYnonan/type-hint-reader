<?php

namespace Thr;

class OnlyConstructorParameters
{
    private $int;
    private $integer;
    private $float;
    private $array;
    private $dateTime;
    private $onlyConstructorParameters;
    private $mixed;

    private function __construct(
        ?int $int,
        \integer $integer,
        float $float,
        array $array,
        \DateTime $dateTime,
        ?OnlyConstructorParameters $onlyConstructorParameters,
        $mixed
    ) {
        $this->int = $int;
        $this->integer = $integer;
        $this->float = $float;
        $this->array = $array;
        $this->dateTime = $dateTime;
        $this->onlyConstructorParameters = $onlyConstructorParameters;
        $this->mixed = $mixed;
    }
}
