<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GetEntityUseCaseMediator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GetEntityUseCaseMediatorImpl implements GetEntityUseCaseMediator
{
    use CommonUseCaseGetMediatorsTrait;
    use GetEntityUseCaseGeneratorsTrait;

    /**
     * @return FileObject[]
     */
    protected function generateSources(string $className): array
    {
        $fileObjects[] = $this->generateEntityGatewayGenerator($className);
        $fileObjects[] = $this->generateEntityNotFoundExceptionGenerator($className);
        $fileObjects[] = $this->generateEntityRepositoryGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseRequestBuilderGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseRequestBuilderImplGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseRequestDTOGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseRequestGenerator($className);
        $fileObjects[] = $this->generateUseCaseDetailResponseAssemblerGenerator($className);
        $fileObjects[] = $this->generateUseCaseDetailResponseAssemblerImplGenerator($className);
        $fileObjects[] = $this->generateUseCaseDetailResponseDTOGenerator($className);
        $fileObjects[] = $this->generateUseCaseDetailResponseGenerator($className);
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
        $fileObjects[] = $this->generateGetEntityUseCaseTestGenerator($className);
        $fileObjects[] = $this->generateInMemoryEntityGatewayGenerator($className);
        $fileObjects[] = $this->generateUseCaseDetailResponseAssemblerMockGenerator($className);
        $fileObjects[] = $this->generateUseCaseDetailResponseStubGenerator($className);
        $fileObjects[] = $this->generateUseCaseDetailResponseTestCaseGenerator($className);
        $fileObjects[] = $this->generateUseCaseResponseTestCaseGenerator($className);

        return $fileObjects;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }
}
