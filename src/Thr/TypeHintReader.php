<?php

namespace Thr;

/**
 * Class TypeHintReader
 * @package Thr
 */
class TypeHintReader implements TypeReader
{
    private $class;

    /**
     * TypeHintReader constructor.
     * @param \ReflectionClass $class
     */
    public function __construct(\ReflectionClass $class)
    {
        $this->class = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function getReflectionType(string $propertyName): \ReflectionType
    {
        $reflectionType = $this->getReflectionParameter($propertyName)
            ->getType();
        if ($reflectionType === null) {
            throw TypeHintReaderException::withoutTypeHint($propertyName);
        }

        return $reflectionType;
    }

    private function getReflectionParameter(
        string $propertyName
    ): \ReflectionParameter {
        return $this->getReflectionPropertyBySetter($propertyName)
            ?? $this->getReflectionPropertyByConstruct($propertyName);
    }

    private function getReflectionPropertyBySetter(
        string $propertyName
    ): ?\ReflectionParameter {
        $nameSetter = 'set'.ucfirst($propertyName);
        if ($this->class->hasMethod($nameSetter)) {
            $methodSetter = $this->class->getMethod($nameSetter);
            return $methodSetter->getParameters()[0];
        }

        return null;
    }

    private function getReflectionPropertyByConstruct(
        string $propertyName
    ): \ReflectionParameter {
        $constructor = $this->class->getConstructor();
        $parameter = $this->getParameter($propertyName, $constructor);

        if ($parameter instanceof \ReflectionParameter) {
            return $parameter;
        }

        throw TypeHintReaderException::invalidPropertyName($propertyName);
    }

    private function getParameter(
        string $propertyName,
        \ReflectionMethod $constructor
    ): ?\ReflectionParameter {
        foreach ($constructor->getParameters() as $parameter) {
            if ($parameter->getName() === $propertyName) {
                return $parameter;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTypeName(string $propertyName): string
    {
        return $this->getReflectionType($propertyName)->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function typeAllowNull(string $propertyName): bool
    {
        return $this->getReflectionType($propertyName)->allowsNull();
    }

    /**
     * {@inheritdoc}
     */
    public function typeIsBuiltin(string $propertyName): bool
    {
        return $this->getReflectionType($propertyName)->isBuiltin();
    }

    /**
     * @param string $class
     * @return TypeHintReader
     * @throws TypeHintReaderException
     * @throws \ReflectionException
     */
    public static function byClassName(string $class): self
    {
        if (!class_exists($class)) {
            throw TypeHintReaderException::notExistsClass($class);
        }

        return new self(new \ReflectionClass($class));
    }
}
