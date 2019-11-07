<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility\Impl;

use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtility as Utility;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtilityStrategy;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
final class FieldObjectUtilityGetFields implements FieldObjectUtilityStrategy
{
    public function getFields(string $className): array
    {
        return Utility::getProtectedClassFields($className);
    }
}
