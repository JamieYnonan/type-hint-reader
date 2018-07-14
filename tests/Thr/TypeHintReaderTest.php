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
     */
    public function getTypeByConstructor()
    {
        $typeReader = TypeHintReader::byClassName(
            OnlyConstructorParameters::class
        );

        $this->assertEquals('int', $typeReader->getTypeName('int'));
        $this->assertEquals('integer', $typeReader->getTypeName('integer'));
        $this->assertEquals('float', $typeReader->getTypeName('float'));
        $this->assertEquals('array', $typeReader->getTypeName('array'));
        $this->assertEquals('object', $typeReader->getTypeName('object'));
        $this->assertEquals('DateTime', $typeReader->getTypeName('dateTime'));
        $this->assertEquals(
            'Thr\OnlyConstructorParameters',
            $typeReader->getTypeName('onlyConstructorParameters')
        );
    }

    /**
     * @test
     */
    public function getTypeBySetter()
    {
        $typeReader = new TypeHintReader(
            new \ReflectionClass(OnlySetterParameters::class)
        );

        $this->assertEquals('int', $typeReader->getTypeName('int'));
        $this->assertEquals('integer', $typeReader->getTypeName('integer'));
        $this->assertEquals('float', $typeReader->getTypeName('float'));
        $this->assertEquals('array', $typeReader->getTypeName('array'));
        $this->assertEquals('object', $typeReader->getTypeName('object'));
        $this->assertEquals('DateTime', $typeReader->getTypeName('dateTime'));
        $this->assertEquals(
            'Thr\OnlySetterParameters',
            $typeReader->getTypeName('onlySetterParameters')
        );
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
