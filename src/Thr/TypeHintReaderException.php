<?php

namespace Thr;

/**
 * Class TypeHintReaderException
 * @package Thr
 */
final class TypeHintReaderException extends \Exception
{
    /**
     * @param $propertyName
     * @return TypeHintReaderException
     */
    public static function withoutTypeHint(string $propertyName): self
    {
        return new self(sprintf("The parameter %s haven't type hint", $propertyName));
    }

    /**
     * @param string $propertyName
     * @return TypeHintReaderException
     */
    public static function invalidPropertyName(string $propertyName): self
    {
        return new self(sprintf("The parameter %s not exists", $propertyName));
    }

    /**
     * @param string $class
     * @return TypeHintReaderException
     */
    public static function notExistsClass(string $class): self
    {
        return new self(sprintf("The class %s not exists", $class));
    }
}
