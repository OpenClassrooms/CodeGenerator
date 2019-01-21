<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class MethodUtility
{
    public static function getTestCaseAssertMethod(string $shortName)
    {
        if (false !== strpos($shortName, 'ListItem')) {

            return 'assert' . str_replace('TestCase', 's', $shortName);
        }

        return 'assert' . $shortName;
    }
}
