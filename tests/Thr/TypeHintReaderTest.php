<?php

namespace Thr;

use PHPUnit\Framework\TestCase;

/**
 * Class TypeHintReaderTest
 * @package Thr
 */
class TypeHintReaderTest extends TestCase
{
    /**
     * @test
     * @expectedException \Thr\TypeHintReaderException
     * @expectedExceptionMessage The class NotExists not exists
     */
    public function invalidClass()
    {
        TypeHintReader::byClassName('NotExists');
    }

    /**
     * @test
     * @dataProvider constructorTypesProvider
     */
    public function getTypeByConstructor(string $expected, string $propertyName)
    {
        $typeReader = TypeHintReader::byClassName(
            OnlyConstructorParameters::class
        );

        $typeName = $typeReader->getTypeName($propertyName);
        $this->assertEquals($expected, $typeName);
    }

    public function constructorTypesProvider(): array
    {
        $types = $this->baseTypes();
        array_push(
            $types,
            ['Thr\OnlyConstructorParameters', 'onlyConstructorParameters']
        );

        return $types;
    }

    private function baseTypes(): array
    {
        return [
            ['int', 'int'],
            ['integer', 'integer'],
            ['float', 'float'],
            ['array', 'array'],
            ['object', 'object'],
            ['DateTime', 'dateTime']
        ];
    }

    /**
     * @test
     * @dataProvider setterTypesProvider
     */
    public function getTypeBySetter(string $expected, string $propertyName)
    {
        $typeReader = new TypeHintReader(
            new \ReflectionClass(OnlySetterParameters::class)
        );

        $typeName = $typeReader->getTypeName($propertyName);
        $this->assertEquals($expected, $typeName);
    }

    public function setterTypesProvider(): array
    {
        $types = $this->baseTypes();
        array_push(
            $types,
            ['Thr\OnlySetterParameters', 'onlySetterParameters']
        );

        return $types;
    }

    /**
     * @test
     * @expectedException \Thr\TypeHintReaderException
     * @expectedExceptionMessage The parameter mixed haven't type hint
     */
    public function exceptionWithoutTypeHint()
    {
        $typeReader = TypeHintReader::byClassName(
            OnlyConstructorParameters::class
        );
        $typeReader->getTypeName('mixed');
    }

    /**
     * @test
     * @expectedException \Thr\TypeHintReaderException
     * @expectedExceptionMessage The parameter invalid not exists
     */
    public function exceptionInvalidPropertyName()
    {
        $typeReader = TypeHintReader::byClassName(
            OnlyConstructorParameters::class
        );
        $typeReader->getTypeName('invalid');
    }

    /**
     * @test
     */
    public function allowNull()
    {
        $typeReaderConstruct = TypeHintReader::byClassName(
            OnlyConstructorParameters::class
        );
        $typeReaderSetter = TypeHintReader::byClassName(
            OnlySetterParameters::class
        );

        $this->assertTrue($typeReaderConstruct->typeAllowNull('int'));
        $this->assertTrue(
            $typeReaderConstruct->typeAllowNull('onlyConstructorParameters')
        );
        $this->assertTrue($typeReaderSetter->typeAllowNull('array'));
        $this->assertTrue($typeReaderSetter->typeAllowNull('object'));
    }

    /**
     * @test
     */
    public function builtin()
    {
        $typeReaderConstruct = TypeHintReader::byClassName(
            OnlyConstructorParameters::class
        );
        $typeReaderSetter = TypeHintReader::byClassName(
            OnlySetterParameters::class
        );

        $this->assertTrue($typeReaderConstruct->typeIsBuiltin('int'));
        $this->assertFalse(
            $typeReaderConstruct->typeIsBuiltin('onlyConstructorParameters')
        );
        $this->assertTrue($typeReaderSetter->typeIsBuiltin('array'));
        $this->assertFalse($typeReaderSetter->typeIsBuiltin('object'));
    }
}
