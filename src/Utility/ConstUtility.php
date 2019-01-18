<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use Carbon\Carbon;
use Faker\Provider\Base;
use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ConstUtility
{
    private const BOOL = true;

    private const QUOTE = "'";

    public static function generateStubConstObject(
        FieldObject $fieldObject,
        FileObject $stubFileObject
    ): ConstObject
    {
        $constObject = new ConstObject($fieldObject->getName());
        $constObject->setValue(
            self::createFakeValue($fieldObject->getType(), $fieldObject->getName(), $stubFileObject->getShortName())
        );

        return $constObject;
    }

    private static function createFakeValue(string $type, string $fieldName, string $entityName)
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
            case '\DateTimeImmutable'  :
            case '\DateTimeInterface' :
                return Carbon::parse('first day of January 2018')->toDateString();
            default:
                throw new \InvalidArgumentException($type);
        }
    }

    /**
     * @return ConstObject[]
     */
    public static function generateConstsFromStubReference(FileObject $stubReference): array
    {
        $constObjects = [];
        foreach ($stubReference->getConsts() as $const) {
            $constObject = new ConstObject($const->getName());
            $constObject->setValue($stubReference->getShortName() . '::' . $const->getName());
            $constObjects[] = $constObject;
        }

        return $constObjects;
    }
}
