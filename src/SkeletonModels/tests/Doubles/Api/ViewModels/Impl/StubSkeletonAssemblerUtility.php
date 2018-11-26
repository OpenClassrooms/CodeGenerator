<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\Impl;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait StubSkeletonAssemblerUtility
{
    /**
     * @param $fieldObjects []
     */
    private function constructorIsNeeded(array $fieldObjects): bool
    {
        foreach ($fieldObjects as $fieldObject) {
            if (!empty($fieldObject->getInitialisation())) {
                return true;
            }
        }

        return false;
    }
}
