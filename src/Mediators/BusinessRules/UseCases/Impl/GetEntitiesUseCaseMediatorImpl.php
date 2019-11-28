<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\UseCaseListItemResponseMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GetEntitiesUseCaseMediator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GetEntitiesUseCaseMediatorImpl implements GetEntitiesUseCaseMediator
{
    use CommonUseCaseGetMediatorsTrait;
    use GetEntitiesUseCaseGeneratorsTrait;

    /**
     * @var UseCaseListItemResponseMediator
     */
    private $useCaseListItemResponseMediator;

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

        $fileObjects[] = $this->entitiesMediator->generateEntityGatewayGenerator($className);
        $fileObjects[] = $this->entitiesMediator->generateEntityNotFoundExceptionGenerator($className);
        $fileObjects[] = $this->entitiesMediator->generateEntityRepositoryGenerator($className);

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

        $fileObjects[] = $this->useCaseResponseCommonMediator->generateUseCaseResponseCommonFieldTraitGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseResponseCommonMediator->generateUseCaseResponseGenerator($className);
        $fileObjects[] = $this->useCaseResponseCommonMediator->generateUseCaseResponseAssemblerTraitGenerator(
            $className
        );

        return $fileObjects;
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

    public function setUseCaseListItemResponseMediator(
        UseCaseListItemResponseMediator $useCaseListItemResponseMediator
    ): void {
        $this->useCaseListItemResponseMediator = $useCaseListItemResponseMediator;
    }
}
