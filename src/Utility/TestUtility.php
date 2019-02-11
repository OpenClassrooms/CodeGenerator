<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class TestUtility
{
    const LIST_ITEM = 'ListItem';

    public static function buildTestCaseAssertMethodName(string $classShortName)
    {
        if (false !== strpos($classShortName, self::LIST_ITEM)) {
            $entityName = FileObjectUtility::getEntityNameFromClassName($classShortName);

            return 'assert' . $entityName . StringUtility::pluralize(self::LIST_ITEM);
        }

        return 'assert' . $classShortName;
    }
}
