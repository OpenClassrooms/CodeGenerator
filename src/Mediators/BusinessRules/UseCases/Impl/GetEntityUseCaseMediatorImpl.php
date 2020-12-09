<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GetEntityUseCaseMediator;

class GetEntityUseCaseMediatorImpl implements GetEntityUseCaseMediator
{
    use CommonEntityUseCaseMediatorsTrait;
    use GetEntityUseCaseGeneratorsTrait;
    use UseCaseDetailResponseMediatorTrait;

    /**
     * @return FileObject[]
     */
    protected function generateSources(string $className): array
    {
        $fileObjects[] = $this->generateGetEntityUseCaseGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseRequestBuilderGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseRequestDTOGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseRequestGenerator($className);

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
        $fileObjects[] = $this->generateGetEntityUseCaseTestGenerator($className);
        $fileObjects[] = $this->entitiesMediator->generateEntityStubGenerator($className);
        $fileObjects[] = $this->entitiesMediator->generateInMemoryEntityGatewayGenerator($className);
        $fileObjects[] = $this->useCaseResponseCommonMediator->generateUseCaseResponseTestCaseGenerator($className);

        return array_merge($fileObjects, $this->generateUseCaseDetailTestSources($className));
    }
}
