<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

trait CrudSkeletonModelBuilderTrait
{
    /**
     * @param MethodObject[] $methods
     */
    private function useCarbon(array $methods)
    {
        foreach ($methods as $method) {
            /** @var MethodObject $method */
            if ($method->isDateType()) {
                return true;
            }
        }

        return false;
    }
}
