<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;
use PHPUnit\Framework\Assert as Assert;

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
        /** @var MethodObject $expectedMethodObject */
        foreach ($expectedMethodObjects as $key => $expectedMethodObject) {
            Assert::assertEquals($expectedMethodObject->getDocComment(), $actualMethodObjects[$key]->getDocComment());
            Assert::assertEquals($expectedMethodObject->getName(), $actualMethodObjects[$key]->getName());
            Assert::assertEquals($expectedMethodObject->getAccessorName(), $actualMethodObjects[$key]->getAccessorName());
            Assert::assertEquals($expectedMethodObject->getReturnType(), $actualMethodObjects[$key]->getReturnType());
            Assert::assertEquals($expectedMethodObject->isNullable(), $actualMethodObjects[$key]->isNullable());
        }
    }
}
