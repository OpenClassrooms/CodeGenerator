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
        Assert::assertCount(count($expectedMethodObjects), $actualMethodObjects);
        foreach ($expectedMethodObjects as $key => $expectedMethodObject) {
            Assert::assertEquals($expectedMethodObject->getName(), $actualMethodObjects[$key]->getName());
        }
    }
}
