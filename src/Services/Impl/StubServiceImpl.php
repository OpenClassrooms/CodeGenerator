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

    const BOOL = 'true';

    const CLOSE_BRACKET = ']';

    const FLOAT = 1.0;

    const INT = 1;

    const OPEN_BRACKET = '[';

    const QUOTE = "'";

    /**
     * @param FieldObject[]
     */
    public function setFakeValuesToFields(array $responseFields, FileObject $fileObject): array
    {
        $fieldObjects = [];
        foreach ($responseFields as $responseField) {
            $fieldObjects[] = $this->createStubFieldObjectWithFakeValue($responseField, $fileObject);
        }

        return $fieldObjects;
    }

    private function createStubFieldObjectWithFakeValue(
        FieldObject $responseField,
        FileObject $fileObject
    ): StubFieldObject
    {
        $stubFieldObject = new StubFieldObject($responseField->getName());
        $stubFieldObject->setConst($this->convertToUpperSnakeCase($responseField->getName()));

        switch ($responseField->getType()) {
            case 'int' :
                $stubFieldObject->setValue(self::INT);
                break;
            case 'float' :
                $stubFieldObject->setValue(self::FLOAT);
                break;
            case 'bool' :
                $stubFieldObject->setValue(self::BOOL);
                break;
            case 'string' :
                $stubFieldObject->setValue(
                    $this->buildFakeConstValue($responseField, $fileObject)
                );
                break;
            case 'array' :
                $value1 = 1;
                $value2 = 2;
                $stubFieldObject->setValue(
                    self::OPEN_BRACKET . $this->buildFakeConstValue($responseField, $fileObject, $value1) . ', ' .
                    $this->buildFakeConstValue($responseField, $fileObject, $value2) . self::CLOSE_BRACKET
                );
                break;
            case 'DateTimeImmutable' :
                $stubFieldObject->setValue(self::QUOTE . date('Y') . '-01-01' . self::QUOTE);
                $stubFieldObject->setConst($this->convertToUpperSnakeCase($responseField->getName()));
                $stubFieldObject->setInitialisation(
                    'new \DateTimeImmutable(Carbon::now()->toDateTimeString())'
                );
                $stubFieldObject->setObjectNamespace('Carbon\Carbon');
                break;
            default:
                throw new \InvalidArgumentException($responseField->getType());
                break;
        }

        return $stubFieldObject;
    }

    private function buildFakeConstValue(FieldObject $responseField, FileObject $fileObject, int $number = null): string
    {
        $constValue = $this->convertToSpacedString(
                $fileObject->getShortName()
            ) . ' Stub 1 ' . $this->convertToSpacedString(
                $responseField->getName()
            );

        $constValue = isset($number) ? $constValue . ' ' . $number : $constValue;

        return self::QUOTE . $constValue . self::QUOTE;
    }

    /**
     * @param FieldObject[]
     */
    public function setNameAndStubValues(array $responseFields, FileObject $fileObject): array
    {
        $stubFieldObjects = [];
        foreach ($responseFields as $responseField) {
            $stubFieldObjects[] = $this->buildStubFieldObject($fileObject, $responseField);
        }

        return $stubFieldObjects;
    }

    private function buildStubFieldObject(FileObject $fileObject, FieldObject $responseField): StubFieldObject
    {
        if ($responseField->isInherited()) {
            return $this->createStubFieldObject($fileObject, $responseField);
        }

        if (!$responseField->isInherited() && $this->isEntityResponseDTO($fileObject)) {
            return $this->createStubFieldObject($fileObject, $responseField, true);
        }

        return $this->createStubFieldObjectWithFakeValue($responseField, $fileObject);
    }

    private function createStubFieldObject(
        FileObject $fileObject,
        FieldObject $responseField,
        bool $isFieldDetailResponseInherited = false
    ): StubFieldObject
    {
        $stubFieldObject = new StubFieldObject($responseField->getName());
        $stubFieldObject->setDocComment($responseField->getDocComment());
        $stubFieldObject->setConst($this->convertToUpperSnakeCase($responseField->getName()));
        $stubFieldObject->setValue(
            $this->getConstValueFromClass($stubFieldObject, $fileObject, $isFieldDetailResponseInherited)
        );

        return $stubFieldObject;
    }

    private function getConstValueFromClass(
        StubFieldObject $stubFieldObject,
        FileObject $fileObject,
        bool $isFieldDetailResponseInherited
    ): string
    {
        if ($isFieldDetailResponseInherited) {
            return $fileObject->getEntity() . 'DetailStub1::' . $stubFieldObject->getConst();
        }

        if ($this->isEntityResponseDTO($fileObject)) {
            return $fileObject->getEntity() . 'Stub1::' . $stubFieldObject->getConst();
        }
        return $fileObject->getShortName() . 'ResponseStub1::' . $stubFieldObject->getConst();
    }

    private function isEntityResponseDTO(FileObject $fileObject): bool
    {
        return strpos($fileObject->getShortName(), 'ResponseDTO') !== false;
    }
}
