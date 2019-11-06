<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
trait StubSkeletonAssemblerUtility
{
    /**
     * @param FieldObject $fieldObjects []
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

    private function getDateTimeType()
    {
        return ['\\DateTime', '\\DateTimeImmutable', '\\DateTimeInterface'];
    }
}
