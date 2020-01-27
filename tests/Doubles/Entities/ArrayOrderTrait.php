<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

trait ArrayOrderTrait
{
    /**
     * @param FieldObject[]|MethodObject[] $expectedObjects
     * @param FieldObject[]|MethodObject[] $actualObjects
     */
    protected function orderArraysBeforeCompare(array $expectedObjects, array $actualObjects): array
    {
        usort($actualObjects, [$this, "orderArrayObjectsByName"]);
        usort($expectedObjects, [$this, "orderArrayObjectsByName"]);

        return [$expectedObjects, $actualObjects];
    }

    /**
     * @param FieldObject|MethodObject $a
     * @param FieldObject|MethodObject $b
     */
    private function orderArrayObjectsByName($a, $b): int
    {
        return strcmp($a->getName(), $b->getName());
    }
}
