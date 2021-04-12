<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Utility\StubUtilityStrategy;

trait StubFieldObjectTrait
{
    private StubUtilityStrategy $stubUtilityStrategy;

    public function setStubUtilityStrategy(StubUtilityStrategy $stubUtilityStrategy): void
    {
        $this->stubUtilityStrategy = $stubUtilityStrategy;
    }

    /**
     * FieldObject[] $stubFieldObjects
     */
    private function buildStubFieldObjects(FileObject $stubFileObject, array $stubFieldObjects)
    {
        foreach ($stubFieldObjects as $stubFieldObject) {
            $constObject = new ConstObject($stubFieldObject->getName());
            $constObject->setValue(
                $this->stubUtilityStrategy->createFakeValue(
                    $stubFieldObject->getType(),
                    $stubFieldObject->getName(),
                    $stubFileObject->getShortName()
                )
            );
            $stubFieldObject->setValue($constObject);
        }

        return $stubFieldObjects;
    }
}
