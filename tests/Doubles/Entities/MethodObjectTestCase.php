<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities;

use OpenClassrooms\CodeGenerator\Entities\MethodObject;
use PHPUnit\Framework\Assert as Assert;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
trait MethodObjectTestCase
{
    /**
     * @param MethodObject[] $expectedMethodObjects
     * @param MethodObject[] $actualMethodObjects
     */
    protected function assertMethodObjects(array $expectedMethodObjects, array $actualMethodObjects): void
    {
        [$expectedMethodObjects, $actualMethodObjects] = $this->orderArraysBeforeCompare(
            $expectedMethodObjects,
            $actualMethodObjects
        );
        Assert::assertCount(count($expectedMethodObjects), $actualMethodObjects);
        foreach ($expectedMethodObjects as $key => $expectedMethodObject) {
            Assert::assertEquals($expectedMethodObject->getDocComment(), $actualMethodObjects[$key]->getDocComment());
            Assert::assertEquals($expectedMethodObject->getName(), $actualMethodObjects[$key]->getName());
            Assert::assertEquals($expectedMethodObject->getFieldName(), $actualMethodObjects[$key]->getFieldName());
            Assert::assertEquals($expectedMethodObject->getReturnType(), $actualMethodObjects[$key]->getReturnType());
            Assert::assertEquals($expectedMethodObject->isNullable(), $actualMethodObjects[$key]->isNullable());
        }
    }
}
