<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities;

use OpenClassrooms\CodeGenerator\Entities\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\MethodObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
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
        $al = strtolower($a->getName());
        $bl = strtolower($b->getName());
        if ($al == $bl) {
            return 0;
        }

        return ($al > $bl) ? +1 : -1;
    }
}
