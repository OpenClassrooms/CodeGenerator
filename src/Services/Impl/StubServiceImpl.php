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
            $fieldObjects[] = $this->generateFakeFieldValue($responseField, $fileObject);
        }

        return $fieldObjects;
    }

    private function generateFakeFieldValue(FieldObject $responseField, FileObject $fileObject): StubFieldObject
    {
        $stubFieldObject = new StubFieldObject($responseField->getName());
        $this->setConstToStub($stubFieldObject, $responseField);

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
                    $this->buildConstValue($responseField, $fileObject)
                );
                break;
            case 'array' :
                $value1 = 1;
                $value2 = 2;
                $stubFieldObject->setValue(
                    self::OPEN_BRACKET . $this->buildConstValue($responseField, $fileObject, $value1) . ', ' .
                    $this->buildConstValue($responseField, $fileObject, $value2) . self::CLOSE_BRACKET
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

    private function setConstToStub(StubFieldObject $stubFieldObject, FieldObject $responseField): void
    {
        $stubFieldObject->setConst($this->convertToUpperSnakeCase($responseField->getName()));
    }

    private function buildConstValue(FieldObject $responseField, FileObject $fileObject, int $number = null): string
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
            $stubFieldObject = new StubFieldObject($responseField->getName());
            $stubFieldObject->setDocComment($responseField->getDocComment());
            if ($responseField->isInherited()) {
                $this->setConstToStub($stubFieldObject, $responseField);
                $stubFieldObject->setValue($this->getConstValue($stubFieldObject, $fileObject));
            } else {
                $stubFieldObject = $this->generateFakeFieldValue($stubFieldObject, $fileObject);
            }
            $stubFieldObjects[] = $stubFieldObject;
        }

        return $stubFieldObjects;
    }

    private function getConstValue(StubFieldObject $stubFieldObject, FileObject $fileObject): string
    {
        return $fileObject->getShortName() . 'ResponseStub1::' . $stubFieldObject->getConst();
    }
}
