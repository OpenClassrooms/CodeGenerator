<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use Carbon\Carbon;
use Faker\Provider\Base;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class StubUtility
{
    private const BOOL = true;

    private const DEFAULT_DATE = '2018-01-01';

    private const QUOTE = "'";

    public static function createFakeValue(string $type, string $fieldName, string $entityName)
    {
        switch ($type) {
            case 'int' :
                return 1;
            case 'float' :
                return Base::randomFloat();
            case 'bool' :
                return self::BOOL;
            case 'string' :
                return self::QUOTE . StringUtility::convertToSpacedString($entityName . ' ' . $fieldName) . self::QUOTE;
            case 'array' :
                $value = StringUtility::convertToSpacedString($entityName . ' ' . $fieldName);

                return [$value . " 1", $value . " 2"];
            case '\DateTime' :
            case '\DateTimeImmutable' :
            case '\DateTimeInterface' :
                return Carbon::createFromFormat('Y-m-d', self::DEFAULT_DATE)->toDateString();
            case StringUtility::isObject($type):
                return self::QUOTE . StringUtility::convertToSpacedString(
                    $entityName . ' ' . $fieldName
                    ) . 'object' . self::QUOTE;
            default:
                throw new \InvalidArgumentException($type);
        }
    }

    /**
     * @param FileObject[] $fileObjects
     */
    public static function incrementSuffix(FileObject $fileObject, array $fileObjects): FileObject
    {
        $pattern = '/\d+$/';
        $suffix = 1;
        while (isset($fileObjects[$fileObject->getId()]) && preg_match($pattern, $fileObject->getId())) {
            $suffix++;
            $fileObject->setClassName(preg_replace($pattern, $suffix, $fileObject->getId()));
        }

        return $fileObject;
    }
}
