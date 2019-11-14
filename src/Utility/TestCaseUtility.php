<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
final class TestCaseUtility
{
    private const LIST_ITEM = 'ListItem';

    public static function buildTestCaseAssertMethodName(string $classShortName)
    {
        $classShortName = str_replace('TestCase', '', $classShortName);
        if (false !== strpos($classShortName, self::LIST_ITEM)) {
            return 'assert' . StringUtility::pluralize($classShortName);
        }

        return 'assert' . $classShortName;
    }
}
