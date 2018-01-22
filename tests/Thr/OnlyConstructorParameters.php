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
     * @var float
     */
    private $double;
    /**
     * @var string
     */
    private $string;
    /**
     * @var bool
     */
    private $bool;
    /**
     * @var bool
     */
    private $boolean;
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

    private function __construct(
        ?int $int,
        \integer $integer,
        float $float,
        \double $double,
        string $string,
        bool $bool,
        \boolean $boolean,
        array $array,
        \object $object,
        \DateTime $dateTime,
        ?OnlyConstructorParameters $onlyConstructorParameters,
        $mixed
    ) {
        $this->int = $int;
        $this->integer = $integer;
        $this->float = $float;
        $this->double = $double;
        $this->string = $string;
        $this->bool = $bool;
        $this->boolean = $boolean;
        $this->array = $array;
        $this->object = $object;
        $this->dateTime = $dateTime;
        $this->onlyConstructorParameters = $onlyConstructorParameters;
        $this->mixed = $mixed;
    }
}