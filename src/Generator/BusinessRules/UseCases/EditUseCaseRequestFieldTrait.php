<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtilityStrategy;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

trait EditUseCaseRequestFieldTrait
{
    /**
     * @var FieldObjectUtilityStrategy
     */
    private $fieldUtility;

    public function setFieldUtility(FieldObjectUtilityStrategy $fieldUtility): void
    {
        $this->fieldUtility = $fieldUtility;
    }

    private function buildEditUseCaseRequestFields(string $entityClassName): array
    {
        $accessors = $this->fieldUtility->getFields($entityClassName);
        $isUpdatedFields = FieldObjectUtility::buildIsUpdatedFields($entityClassName);
        $entityIdMethod = FieldObjectUtility::buildEntityIdMethodObject(
            FileObjectUtility::getShortClassName($entityClassName)
        );
        $entityIdMethod = array($entityIdMethod);

        return array_merge($accessors, $isUpdatedFields, $entityIdMethod);
    }
}
