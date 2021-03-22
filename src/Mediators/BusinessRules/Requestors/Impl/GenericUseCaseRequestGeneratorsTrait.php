<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GenericUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;

trait GenericUseCaseRequestGeneratorsTrait
{
    /** @var GenericUseCaseRequestGenerator */
    private $genericUseCaseRequestGenerator;

    /** @var GenericUseCaseRequestGeneratorRequestBuilder */
    private $genericUseCaseRequestGeneratorRequestBuilder;

    public function setGenericUseCaseRequestGenerator(
        Generator $genericUseCaseRequestGenerator
    ): void {
        $this->genericUseCaseRequestGenerator = $genericUseCaseRequestGenerator;
    }

    public function setGenericUseCaseRequestGeneratorRequestBuilder(
        GenericUseCaseRequestGeneratorRequestBuilder $genericUseCaseRequestGeneratorRequestBuilder
    ): void {
        $this->genericUseCaseRequestGeneratorRequestBuilder = $genericUseCaseRequestGeneratorRequestBuilder;
    }

    protected function generateGenericUseCaseRequest(string $domain, string $useCaseName): FileObject
    {
        return $this->genericUseCaseRequestGenerator->generate(
            $this->genericUseCaseRequestGeneratorRequestBuilder->create()->withDomain($domain)
                ->withUseCaseName($useCaseName)
                ->build()
        );
    }
}
