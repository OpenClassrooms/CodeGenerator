<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GetEntitiesUseCaseMediator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GetEntitiesUseCaseMediatorImpl implements GetEntitiesUseCaseMediator
{
    use CommonUseCaseGetMediatorsTrait;
    use GetEntitiesUseCaseGeneratorsTrait;

    /**
     * @return FileObject[]
     */
    protected function generateSources(string $className): array
    {
        $fileObjects[] = $this->generateEntityGatewayGenerator($className);
        $fileObjects[] = $this->generateEntityNotFoundExceptionGenerator($className);
        $fileObjects[] = $this->generateEntityRepositoryGenerator($className);
        $fileObjects[] = $this->generateGetEntitiesUseCaseGenerator($className);
        $fileObjects[] = $this->generateGetEntitiesUseCaseRequestBuilderGenerator($className);
        $fileObjects[] = $this->generateGetEntitiesUseCaseRequestBuilderImplGenerator($className);
        $fileObjects[] = $this->generateGetEntitiesUseCaseRequestDTOGenerator($className);
        $fileObjects[] = $this->generateGetEntitiesUseCaseRequestGenerator($className);
        $fileObjects[] = $this->generateUseCaseListItemResponseAssemblerGenerator($className);
        $fileObjects[] = $this->generateUseCaseListItemResponseAssemblerImplGenerator($className);
        $fileObjects[] = $this->generateUseCaseListItemResponseDTOGenerator($className);
        $fileObjects[] = $this->generateUseCaseListItemResponseGenerator($className);
        $fileObjects[] = $this->generateUseCaseResponseDTOGenerator($className);
        $fileObjects[] = $this->generateUseCaseResponseGenerator($className);
        $fileObjects[] = $this->generateUseCaseResponseTraitGenerator($className);

        return $fileObjects;
    }

    /**
     * @return FileObject[]
     */
    protected function generateTestSources(string $className): array
    {
        $fileObjects[] = $this->generateGetEntitiesUseCaseTestGenerator($className);
        $fileObjects[] = $this->generateInMemoryEntityGatewayGenerator($className);
        $fileObjects[] = $this->generateUseCaseListItemResponseAssemblerMockGenerator($className);
        $fileObjects[] = $this->generateUseCaseListItemResponseStubGenerator($className);
        $fileObjects[] = $this->generateUseCaseListItemResponseStubGenerator($className);
        $fileObjects[] = $this->generateEntityStubGenerator($className);
        $fileObjects[] = $this->generateEntityStubGenerator($className);
        $fileObjects[] = $this->generateUseCaseListItemResponseTestCaseGenerator($className);
        $fileObjects[] = $this->generateUseCaseResponseTestCaseGenerator($className);

        return $fileObjects;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }
}
