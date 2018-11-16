<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait StringUtility
{
    public function convertToSpacedString(string $string): string
    {
        return preg_replace('/(?<!^)[A-Z0-9]/', ' $0', $string);
    }

    public function convertToUpperSnakeCase(string $string): string
    {
        return strtoupper(preg_replace('/(?<!^)[A-Z0-9]/', '_$0', $string));
    }
}
