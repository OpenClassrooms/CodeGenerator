<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects;

use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use PHPUnit\Framework\Assert as Assert;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
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

    private function orderArraysBeforeCompare(array $expectedFieldObjects, array $actualFieldObjects): array
    {
        usort($actualFieldObjects, [$this, "orderFieldObjectsByName"]);
        usort($expectedFieldObjects, [$this, "orderFieldObjectsByName"]);

        return [$expectedFieldObjects, $actualFieldObjects];
    }

    private function assertFieldObject(FieldObject $expected, FieldObject $actual)
    {
        $this->AssertValue($expected, $actual);
        Assert::assertEquals($expected->getDocComment(), $actual->getDocComment());
        Assert::assertEquals($expected->getType(), $actual->getType());
        Assert::assertEquals($expected->getName(), $actual->getName());
        Assert::assertEquals($expected->getScope(), $actual->getScope());
    }

    private function AssertValue(FieldObject $expected, FieldObject $actual): void
    {
        if ($actual->getValue() instanceof ConstObject) {
            Assert::assertEquals($expected->getValue()->getName(), $actual->getValue()->getName());
        } else {
            Assert::assertEquals($expected->getValue(), $actual->getValue());
        }
    }

    private function orderFieldObjectsByName(FieldObject $a, FieldObject $b): int
    {
        $al = strtolower($a->getName());
        $bl = strtolower($b->getName());
        if ($al == $bl) {
            return 0;
        }

        return ($al > $bl) ? +1 : -1;
    }
}
