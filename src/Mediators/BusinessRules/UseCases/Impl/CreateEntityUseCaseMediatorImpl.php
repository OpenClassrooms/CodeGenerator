<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\CreateEntityUseCaseMediator;

class CreateEntityUseCaseMediatorImpl implements CreateEntityUseCaseMediator
{
    use CommonEntityUseCaseMediatorsTrait;
    use CreateEntityUseCaseGeneratorsTrait;
    use EntityCommonHydratorTraitGeneratorTrait;
    use EntityUseCaseCommonRequestGeneratorTrait;
    use UseCaseDetailResponseMediatorTrait;

    /**
     * @return FileObject[]
     */
    protected function generateSources(string $className): array
    {
        $fileObjects[] = $this->generateEntityCommonHydratorTraitGenerator($className);
        $fileObjects[] = $this->generateCreateEntityUseCaseGenerator($className);
        $fileObjects[] = $this->generateCreateEntityUseCaseRequestBuilderGenerator($className);
        $fileObjects[] = $this->generateCreateEntityUseCaseRequestBuilderImplGenerator($className);
        $fileObjects[] = $this->generateCreateEntityUseCaseRequestDTOGenerator($className);
        $fileObjects[] = $this->generateCreateEntityUseCaseRequestGenerator($className);
        $fileObjects[] = $this->generateEntityUseCaseCommonRequestTraitGenerator($className);
        $fileObjects[] = $this->generateCreateRequestTraitGenerator($className);

        return array_merge(
            $fileObjects,
            $this->generateUseCaseDetailSources($className),
            $this->generateEntitiesSources($className),
            $this->generateUseCaseResponseCommonSources($className)
        );
    }

    /**
     * @return FileObject[]
     */
    protected function generateTestSources(string $className): array
    {
        $fileObjects[] = $this->generateCreateEntityUseCaseTestGenerator($className);
        $fileObjects[] = $this->entitiesMediator->generateInMemoryEntityGatewayGenerator($className);
        $fileObjects[] = $this->useCaseResponseCommonMediator->generateUseCaseResponseTestCaseGenerator($className);

        return array_merge($fileObjects, $this->generateUseCaseDetailTestSources($className));
    }
}
