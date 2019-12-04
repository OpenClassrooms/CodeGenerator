<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility\Impl;

use OpenClassrooms\CodeGenerator\Utility\MethodUtility as Utility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

final class MethodUtilityGetAccessors implements MethodUtilityStrategy
{
    public function getAccessors(string $className): array
    {
        return Utility::getAccessors($className);
    }
}
