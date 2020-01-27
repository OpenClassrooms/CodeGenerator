<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use PHPUnit\Framework\TestCase;

class ConstUtilityTest extends TestCase
{
    /**
     * @test
     */
    public function generateConstsFromStubFileObject_ReturnConstObjects(): void
    {
        $stubReference = new FileObject(self::class);

        $constsReference = [
            new FieldObject('field1'),
            new FieldObject('field2'),
            new FieldObject('field3'),
            new FieldObject('field4'),
        ];
        $stubReference->setFields($constsReference);

        $actualConstsObject = ConstUtility::generateConstsFromStubFileObject($stubReference);

        $this->assertCount(count($stubReference->getFields()), $actualConstsObject);
        foreach ($stubReference->getConsts() as $key => $expectedConsts) {
            $this->assertEquals($expectedConsts->getName(), $actualConstsObject[$key]->getName());
        }
    }

    /**
     * @test
     * @expectedException  \InvalidArgumentException
     */
    public function generateConstsFromStubReference_ThrowsException(): void
    {
        $fileObject = new FileObject(self::class);

        $fieldObject = $this->buildFieldObject('test', 'not exist');
        ConstUtility::generateStubConstObject($fieldObject, $fileObject);
    }

    /**
     * @return FieldObject
     */
    private function buildFieldObject($name, $type): FieldObject
    {
        $stubFieldObject = new FieldObject($name);
        $stubFieldObject->setDocComment(
            '/**
     * @var ' . $type . '
     */'
        );

        return $stubFieldObject;
    }

    /**
     * @test
     *
     * @dataProvider generateStubConstObjectDataProvider
     */
    public function generateStubConstObject_ReturnFieldObject(
        FieldObject $fieldObjectValue,
        FileObject $fileObject,
        $expectedValue
    ): void {
        $actualConstObjects = ConstUtility::generateStubConstObject($fieldObjectValue, $fileObject);
        $this->assertNotNull($actualConstObjects->getValue());
        $this->assertType($expectedValue, $actualConstObjects);
    }

    /**
     * @param mixed $internalType
     * @param mixed $actual
     */
    private function assertType($internalType, $actual): void
    {
        if (('\DateTime' || '\DateTimeImmutable' || '\DateTimeInterface') === $internalType) {
            $this->assertInstanceOf($internalType, $actual->getValue());
        } else {
            $this->{'assertIs' . $internalType}($actual->getValue());
        }
    }

    public function generateStubConstObjectDataProvider(): array
    {
        $fileObject = new FileObject(self::class);

        return [
            [$this->buildFieldObject('id', 'int'), $fileObject, 'int'],
            [$this->buildFieldObject('field1', 'bool'), $fileObject, 'bool'],
            [$this->buildFieldObject('field2', 'string'), $fileObject, 'string'],
            [$this->buildFieldObject('field3', 'string[]'), $fileObject, 'array'],
            [$this->buildFieldObject('field4', 'float'), $fileObject, 'float'],
            [$this->buildFieldObject('field5', 'array'), $fileObject, 'array'],
            [$this->buildFieldObject('field6', '\DateTimeImmutable'), $fileObject, 'string'],
            [$this->buildFieldObject('field6', '\DateTimeInterface'), $fileObject, 'string'],
        ];
    }
}
