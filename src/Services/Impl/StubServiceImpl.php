<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\StubFieldObject;
use OpenClassrooms\CodeGenerator\Services\StubService;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class StubServiceImpl implements StubService
{
    use StringUtility;

    const ARRAY = '[]';

    const BOOL = 'true';

    const FLOAT = 1.0;

    const INT = 1;

    private function generateFakeFieldValue(FieldObject $responseField, FileObject $fileObject): StubFieldObject
    {
        $fieldObject = new StubFieldObject($responseField->getName());
        switch ($responseField->getType()) {
            case 'int' :
                $fieldObject->setValue(self::INT);
                break;
            case 'float' :
                $fieldObject->setValue(self::FLOAT);
                break;
            case 'bool' :
                $fieldObject->setValue(self::BOOL);
                break;
            case 'string' :
                $fieldObject->setValue(
                    "'" . $this->convertToSpacedString(
                        $fileObject->getShortName()
                    ) . ' Stub 1 ' . $responseField->getName() . "'"
                );
                break;
            case 'array' :
                $fieldObject->setValue(self::ARRAY);
                break;
            default:
                break;
        }

        return $fieldObject;
    }

    private function getConstValue(StubFieldObject $stubFieldObject, FileObject $fileObject): string
    {
        return $fileObject->getShortName() . 'ResponseStub1::' . $stubFieldObject->getConst();
    }

    /**
     * @param FieldObject[]
     */
    public function setFakeValues(array $responseFields, FileObject $fileObject): array
    {
        $fieldObjects = [];
        foreach ($responseFields as $responseField) {
            $fieldObjects[] = $this->generateFakeFieldValue($responseField, $fileObject);
        }

        return $fieldObjects;
    }

    /**
     * @param FieldObject[]
     */
    public function setNameAndStubValues(array $responseFields, FileObject $fileObject): array
    {
        $stubFieldObjects = [];
        foreach ($responseFields as $responseField) {
            $stubFieldObject = new StubFieldObject($responseField->getName());
            $stubFieldObject->setConst($this->convertToUpperSnakeCase($responseField->getName()));
            $stubFieldObject->setValue($this->getConstValue($stubFieldObject, $fileObject));
            $stubFieldObjects[] = $stubFieldObject;
        }

        return $stubFieldObjects;
    }
}
