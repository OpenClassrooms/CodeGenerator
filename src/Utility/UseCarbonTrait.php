<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

trait UseCarbonTrait
{
    /**
     * @param MethodObject[] $methods
     */
    private function useCarbon(array $methods): bool
    {
        foreach ($methods as $method) {
            /** @var MethodObject $method */
            if ($method->isDateType()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param MethodObject[] $methods
     */
    private function methodArgumentUseCarbon(array $methods): bool
    {
        foreach ($methods as $method) {
            foreach ($method->getArguments() as $argument) {
                if ($argument->isDateType()) {
                    return true;
                }
            }
        }

        return false;
    }
}
