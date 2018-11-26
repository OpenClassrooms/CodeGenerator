<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\FileObjects\EnityFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Services\StubService;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseResponseStubGenerator extends AbstractGenerator
{
    /**
     * @var StubService
     */
    private $stubService;

    /**
     * @var EnityFileObjectFactory
     */
    private $useCaseResponseFileObjectFactory;

    /**
     * @param UseCaseResponseStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseResponseStubFileObject = $this->buildViewModelResponseStubFileObject(
            $generatorRequest->getResponseClassName()
        );
    }

    public function setStubService(StubService $stubService): void
    {
        $this->stubService = $stubService;
    }

    public function setUseCaseResponseFileObjectFactory(
        EnityFileObjectFactory $useCaseResponseFileObjectFactory
    )
    {
        $this->useCaseResponseFileObjectFactory = $useCaseResponseFileObjectFactory;
    }

    private function buildViewModelResponseStubFileObject(string $responseClassName)
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);

        $useCaseResponseStubFileObject = $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_STUB,
            $domain,
            $entity
        );

        $useCaseResponseStubFileObject->setFields();

        return $useCaseResponseStubFileObject;
    }
}
