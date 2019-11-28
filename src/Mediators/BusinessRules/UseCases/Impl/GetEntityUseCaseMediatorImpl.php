<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\UseCaseDetailResponseMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GetEntityUseCaseMediator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GetEntityUseCaseMediatorImpl implements GetEntityUseCaseMediator
{
    use CommonUseCaseGetMediatorsTrait;
    use GetEntityUseCaseGeneratorsTrait;

    /**
     * @var UseCaseDetailResponseMediator
     */
    private $useCaseDetailResponseMediator;

    /**
     * @return FileObject[]
     */
    protected function generateSources(string $className): array
    {
        $fileObjects[] = $this->generateGetEntityUseCaseGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseRequestBuilderGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseRequestBuilderImplGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseRequestDTOGenerator($className);
        $fileObjects[] = $this->generateGetEntityUseCaseRequestGenerator($className);

        $fileObjects[] = $this->entitiesMediator->generateEntityGatewayGenerator($className);
        $fileObjects[] = $this->entitiesMediator->generateEntityNotFoundExceptionGenerator($className);
        $fileObjects[] = $this->entitiesMediator->generateEntityRepositoryGenerator($className);

        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseAssemblerGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseAssemblerImplGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseDTOGenerator($className);
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseGenerator($className);
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
        $fileObjects[] = $this->generateGetEntityUseCaseTestGenerator($className);
        $fileObjects[] = $this->entitiesMediator->generateInMemoryEntityGatewayGenerator($className);
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseAssemblerMockGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseStubGenerator($className);
        $fileObjects[] = $this->useCaseDetailResponseMediator->generateUseCaseDetailResponseTestCaseGenerator(
            $className
        );
        $fileObjects[] = $this->useCaseResponseCommonMediator->generateUseCaseResponseTestCaseGenerator($className);

        return $fileObjects;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setUseCaseDetailResponseMediator(UseCaseDetailResponseMediator $useCaseDetailResponseMediator): void
    {
        $this->useCaseDetailResponseMediator = $useCaseDetailResponseMediator;
    }
}
