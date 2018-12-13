<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait StubSkeletonAssemblerUtility
{
    /**
     * @param FieldObject $fieldObjects[]
     */
    private function hasConstructor(array $fieldObjects): bool
    {
        foreach ($fieldObjects as $fieldObject) {
            if ($fieldObject->isObject()) {
                return true;
            }
        }

        return false;
    }
}
