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

    private function buildEditUseCaseRequestDTOFields(string $entityClassName): array
    {
        $isUpdatedFields = FieldObjectUtility::buildIsUpdatedFields($entityClassName);
        $entityIdMethod = FieldObjectUtility::buildEntityIdMethodObject(
            FileObjectUtility::getShortClassName($entityClassName)
        );
        $entityIdMethod = [$entityIdMethod];

        return array_merge($isUpdatedFields, $entityIdMethod);
    }

    private function buildEditUseCaseRequestFields(string $entityClassName): array
    {
        $accessors = $this->fieldUtility->getFields($entityClassName);

        return array_merge($accessors, $this->buildEditUseCaseRequestDTOFields($entityClassName));
    }

    public function setFieldUtility(FieldObjectUtilityStrategy $fieldUtility): void
    {
        $this->fieldUtility = $fieldUtility;
    }
}
