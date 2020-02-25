<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

trait EditUseCaseRequestFieldTrait
{
    private function buildEditUseCaseRequestDTOFields(string $entityClassName): array
    {
        $isUpdatedFields = FieldObjectUtility::buildIsUpdatedFields($entityClassName);
        $entityIdMethod = FieldObjectUtility::buildEntityIdMethodObject(
            FileObjectUtility::getShortClassName($entityClassName)
        );
        $entityIdMethod = [$entityIdMethod];

        return array_merge($isUpdatedFields, $entityIdMethod);
    }
}
