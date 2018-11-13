<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use PHPUnit\Framework\Assert as Assert;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait FieldObjectTestCase
{
    private function assertFieldObject(FieldObject $expected, FieldObject $actual)
    {
        Assert::assertEquals($expected->getAccessor(), $actual->getAccessor());
        Assert::assertEquals($expected->getDocComment(), $actual->getDocComment());
        Assert::assertEquals($expected->getName(), $actual->getName());
        Assert::assertEquals($expected->getScope(), $actual->getScope());
        Assert::assertEquals($expected->getType(), $actual->getType());
    }

    /**
     * @param FieldObject[] $expectedFieldObjects
     * @param FieldObject[]  $actualFieldObjects
     */
    protected function assertFieldObjects(array $expectedFieldObjects, array $actualFieldObjects): void
    {
        Assert::assertCount(count($expectedFieldObjects), $actualFieldObjects);
        foreach ($expectedFieldObjects as $key => $expectedFieldObject) {
            $this->assertFieldObject($expectedFieldObject, $actualFieldObjects[$key]);
        }
    }
}
