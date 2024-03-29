<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use PHPUnit\Framework\Assert;

trait FieldObjectTestCase
{
    /**
     * @param FieldObject[] $expectedFieldObjects
     * @param FieldObject[] $actualFieldObjects
     */
    protected function assertFieldObjects(array $expectedFieldObjects, array $actualFieldObjects): void
    {
        [$expectedFieldObjects, $actualFieldObjects] = $this->orderArraysBeforeCompare(
            $expectedFieldObjects,
            $actualFieldObjects
        );
        Assert::assertCount(count($expectedFieldObjects), $actualFieldObjects);
        foreach ($expectedFieldObjects as $key => $expectedFieldObject) {
            $this->assertFieldObject($expectedFieldObject, $actualFieldObjects[$key]);
        }
    }

    private function assertFieldObject(FieldObject $expected, FieldObject $actual)
    {
        $this->assertValue($expected, $actual);
        Assert::assertEquals($expected->getDocComment(), $actual->getDocComment());
        Assert::assertEquals($expected->getType(), $actual->getType());
        Assert::assertEquals($expected->getName(), $actual->getName());
        Assert::assertEquals($expected->getScope(), $actual->getScope());
    }

    private function assertValue(FieldObject $expected, FieldObject $actual): void
    {
        if ($actual->getValue() instanceof ConstObject) {
            Assert::assertEquals($expected->getValue()->getName(), $actual->getValue()->getName());
        } else {
            Assert::assertEquals($expected->getValue(), $actual->getValue());
        }
    }
}
