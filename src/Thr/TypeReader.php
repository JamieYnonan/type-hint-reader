<?php

namespace Thr;

/**
 * Interface TypeReader
 * @package Thr
 */
interface TypeReader
{
    /**
     * @param string $propertyName
     * @return \ReflectionType
     * @throws TypeHintReaderException
     */
    public function getReflectionType(string $propertyName): \ReflectionType;

    /**
     * @param string $propertyName
     * @return string
     * @throws TypeHintReaderException
     */
    public function getTypeName(string $propertyName): string;

    /**
     * @param string $propertyName
     * @return bool
     * @throws TypeHintReaderException
     */
    public function typeAllowNull(string $propertyName): bool;

    /**
     * @param string $propertyName
     * @return bool
     * @throws TypeHintReaderException
     */
    public function typeIsBuiltin(string $propertyName): bool;
}