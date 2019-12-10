<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility\Impl;

use OpenClassrooms\CodeGenerator\Utility\MethodUtility as Utility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

final class MethodUtilityGetAccessorsWithoutId implements MethodUtilityStrategy
{
    public function getAccessors(string $className): array
    {
        $accessors = Utility::getAccessors($className);

        foreach ($accessors as $key => $accessor) {
            if ($accessor->getName() === 'getId') {
                unset($accessors[$key]);
            }
        }

        return $accessors;
    }
}
