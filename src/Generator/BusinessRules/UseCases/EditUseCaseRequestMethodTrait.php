<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

trait EditUseCaseRequestMethodTrait
{
    /**
     * @var MethodUtilityStrategy
     */
    private $methodUtility;

    public function setMethodUtility(MethodUtilityStrategy $methodUtility): void
    {
        $this->methodUtility = $methodUtility;
    }

    private function buildEditUseCaseRequestMethods(string $entityClassName): array
    {
        $accessors = $this->methodUtility->getAccessors($entityClassName);
        $isUpdatedMethods = MethodUtility::buildIsUpdatedMethods($entityClassName);
        $getEntityMethod = MethodUtility::buildGetEntityIdMethodObject(
            FileObjectUtility::getShortClassName($entityClassName)
        );
        $getEntityMethod = [$getEntityMethod];

        return array_merge($accessors, $isUpdatedMethods, $getEntityMethod);
    }
}
