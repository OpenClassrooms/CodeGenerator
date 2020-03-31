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
        $stubReference = new FileObject(self::class.'Stub1');

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
}
