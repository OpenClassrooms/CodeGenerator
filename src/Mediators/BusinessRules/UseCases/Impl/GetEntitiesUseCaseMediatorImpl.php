<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\UseCaseListItemResponseMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GetEntitiesUseCaseMediator;

class GetEntitiesUseCaseMediatorImpl implements GetEntitiesUseCaseMediator
{
    use CommonEntityUseCaseMediatorsTrait;
    use GetEntitiesUseCaseGeneratorsTrait;

    /**
     * @var UseCaseListItemResponseMediator
     */
    private $useCaseListItemResponseMediator;

    public function setUseCaseListItemResponseMediator(
        UseCaseListItemResponseMediator $useCaseListItemResponseMediator
    ): void {
        $this->useCaseListItemResponseMediator = $useCaseListItemResponseMediator;
    }

    /**
     * @return FileObject[]
     */
    protected function generateSources(string $className): array
    {
        $fileObjects[] = $this->generateGetEntitiesUseCaseGenerator($className);
        $fileObjects[] = $this->generateGetEntitiesUseCaseRequestBuilderGenerator($className);
        $fileObjects[] = $this->generateGetEntitiesUseCaseRequestBuilderImplGenerator($className);
        $fileObjects[] = $this->generateGetEntitiesUseCaseRequestDTOGenerator($className);
        $fileObjects[] = $this->generateGetEntitiesUseCaseRequestGenerator($className);

        $fileObjects[] = $this->useCaseListItemResponseMediator->generateUseCaseListItemResponseAssemblerGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseListItemResponseMediator->generateUseCaseListItemResponseAssemblerImplGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseListItemResponseMediator->generateUseCaseListItemResponseDTOGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseListItemResponseMediator->generateUseCaseListItemResponseGenerator($className);

        return array_merge(
            $fileObjects,
            $this->generateEntitiesSources($className),
            $this->generateUseCaseResponseCommonSources($className)
        );
    }

    /**
     * @return FileObject[]
     */
    protected function generateTestSources(string $className): array
    {
        $fileObjects[] = $this->generateGetEntitiesUseCaseTestGenerator($className);

        $fileObjects[] = $this->entitiesMediator->generateEntityStubGenerator($className);
        $fileObjects[] = $this->entitiesMediator->generateEntityStubGenerator($className);
        $fileObjects[] = $this->entitiesMediator->generateInMemoryEntityGatewayGenerator($className);

        $fileObjects[] = $this->useCaseListItemResponseMediator->generateUseCaseListItemResponseAssemblerMockGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseListItemResponseMediator->generateUseCaseListItemResponseStubGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseListItemResponseMediator->generateUseCaseListItemResponseStubGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseListItemResponseMediator->generateUseCaseListItemResponseTestCaseGenerator(
            $className
        );

        $fileObjects[] = $this->useCaseResponseCommonMediator->generateUseCaseResponseTestCaseGenerator($className);

        return $fileObjects;
    }
}
