<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility\Impl;

use OpenClassrooms\CodeGenerator\Utility\MethodUtility as Utility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
final class MethodUtilityGetAccessors implements MethodUtilityStrategy
{
    public function getAccessors(string $className): array
    {
        return Utility::getAccessors($className);
    }
}
