<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

trait EditUseCaseRequestMethodTrait
{
    private function buildEditUseCaseRequestMethods(string $entityClassName): array
    {
        $accessors = MethodUtility::getAccessorsUpdatable($entityClassName);

        return array_merge($accessors, $this->buildEditUseCaseRequestDTOMethods($entityClassName));
    }

    private function buildEditUseCaseRequestDTOMethods(string $entityClassName): array
    {
        $isUpdatedMethods = MethodUtility::buildIsUpdatedMethods($entityClassName);
        $getEntityMethod = MethodUtility::buildGetEntityIdMethodObject(
            FileObjectUtility::getShortClassName($entityClassName)
        );
        $getEntityMethod = [$getEntityMethod];

        return array_merge($isUpdatedMethods, $getEntityMethod);
    }
}
