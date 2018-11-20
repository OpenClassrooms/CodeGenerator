<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\FileObjects\StubFieldObject;
use PHPUnit\Framework\Assert as Assert;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait FieldObjectTestCase
{
    private function assertFieldObject(FieldObject $expected, FieldObject $actual)
    {
        if (!$actual instanceof StubFieldObject) {
            Assert::assertEquals($expected->getAccessor(), $actual->getAccessor());
            Assert::assertEquals($expected->getDocComment(), $actual->getDocComment());
            Assert::assertEquals($expected->getType(), $actual->getType());
        } else {
            Assert::assertEquals($expected->getConst(), $actual->getConst());
            Assert::assertEquals($expected->getValue(), $actual->getValue());
        }

        Assert::assertEquals($expected->getName(), $actual->getName());
        Assert::assertEquals($expected->getScope(), $actual->getScope());
    }

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
        usort($actualFieldObjects, array($this, "orderFieldObjectsByName"));
        usort($expectedFieldObjects, array($this, "orderFieldObjectsByName"));

        return [$expectedFieldObjects, $actualFieldObjects];
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
