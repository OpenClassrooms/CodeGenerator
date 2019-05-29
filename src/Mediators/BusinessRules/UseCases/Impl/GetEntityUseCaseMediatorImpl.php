<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GetEntityUseCaseMediator;
use OpenClassrooms\CodeGenerator\Mediators\Options;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GetEntityUseCaseMediatorImpl implements GetEntityUseCaseMediator
{
    use CommonUseCaseGetGeneratorsTrait;
    use GetEntityUseCaseGeneratorsTrait;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    public function mediate(array $args = [], array $options = []): array
    {
        $className = $args[Args::CLASS_NAME];

        if (false !== $options[Options::NO_TEST]) {
            $fileObjects = $this->generateSources($className);
        } elseif (false !== $options[Options::TESTS_ONLY]) {
            $fileObjects = $this->generateTestSources($className);
        } else {
            $sourcesFileObjects = $this->generateSources($className);
            $testsFileObjects = $this->generateTestSources($className);
            $fileObjects = array_merge($sourcesFileObjects, $testsFileObjects);
        }
        if (false === $options[Options::DUMP]) {
            $this->fileObjectGateway->flush();
        }

        return $fileObjects;
    }

    /**
     * @return FileObject[]
     */
    private function generateSources(string $className): array
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
    private function generateTestSources(string $className): array
    {
        $fileObjects[] = $this->generateGetEntityUseCaseTestGenerator($className);
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
