<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GenericUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GenericUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait RequestGeneratorsTrait
{
    /** @var GenericUseCaseRequestBuilderGenerator */
    private $genericUseCaseRequestBuilderGenerator;

    /** @var GenericUseCaseRequestBuilderGeneratorRequestBuilder */
    private $genericUseCaseRequestBuilderGeneratorRequestBuilder;

    /** @var GenericUseCaseRequestGenerator */
    private $genericUseCaseRequestGenerator;

    /** @var GenericUseCaseRequestGeneratorRequestBuilder */
    private $genericUseCaseRequestGeneratorRequestBuilder;

    public function setGenericUseCaseRequestBuilderGenerator(
        Generator $genericUseCaseRequestBuilderGenerator
    ): void
    {
        $this->genericUseCaseRequestBuilderGenerator = $genericUseCaseRequestBuilderGenerator;
    }

    public function setGenericUseCaseRequestBuilderGeneratorRequestBuilder(
        GenericUseCaseRequestBuilderGeneratorRequestBuilder $genericUseCaseRequestBuilderGeneratorRequestBuilder
    ): void
    {
        $this->genericUseCaseRequestBuilderGeneratorRequestBuilder = $genericUseCaseRequestBuilderGeneratorRequestBuilder;
    }

    public function setGenericUseCaseRequestGenerator(
        Generator $genericUseCaseRequestGenerator
    ): void
    {
        $this->genericUseCaseRequestGenerator = $genericUseCaseRequestGenerator;
    }

    public function setGenericUseCaseRequestGeneratorRequestBuilder(
        GenericUseCaseRequestGeneratorRequestBuilder $genericUseCaseRequestGeneratorRequestBuilder
    ): void
    {
        $this->genericUseCaseRequestGeneratorRequestBuilder = $genericUseCaseRequestGeneratorRequestBuilder;
    }

    protected function generateGenericUseCaseRequestBuilder(string $domain, string $useCaseName): FileObject
    {
        return $this->genericUseCaseRequestBuilderGenerator->generate(
            $this->genericUseCaseRequestBuilderGeneratorRequestBuilder->create()->withDomainAndUseCaseName(
                $domain,
                $useCaseName
            )->build()
        );
    }

    protected function generateGenericUseCaseRequest(string $domain, string $useCaseName): FileObject
    {
        return $this->genericUseCaseRequestGenerator->generate(
            $this->genericUseCaseRequestGeneratorRequestBuilder->create()->withDomainAndUseCaseName(
                $domain,
                $useCaseName
            )->build()
        );
    }
}
