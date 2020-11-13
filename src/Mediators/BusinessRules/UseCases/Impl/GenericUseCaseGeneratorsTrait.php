<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GenericUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GenericUseCaseTestGeneratorRequestBuilder;

trait GenericUseCaseGeneratorsTrait
{
    /** @var GenericUseCaseGenerator */
    private $genericUseCaseGenerator;

    /** @var GenericUseCaseGeneratorRequestBuilder */
    private $genericUseCaseGeneratorRequestBuilder;

    /** @var GenericUseCaseTestGenerator */
    private $genericUseCaseTestGenerator;

    /** @var GenericUseCaseTestGeneratorRequestBuilder */
    private $genericUseCaseTestGeneratorRequestBuilder;

    public function setGenericUseCaseGenerator(Generator $genericUseCaseGenerator): void
    {
        $this->genericUseCaseGenerator = $genericUseCaseGenerator;
    }

    public function setGenericUseCaseGeneratorRequestBuilder(
        GenericUseCaseGeneratorRequestBuilder $genericUseCaseGeneratorRequestBuilder
    ): void {
        $this->genericUseCaseGeneratorRequestBuilder = $genericUseCaseGeneratorRequestBuilder;
    }

    public function setGenericUseCaseTestGenerator(Generator $genericUseCaseTestGenerator): void
    {
        $this->genericUseCaseTestGenerator = $genericUseCaseTestGenerator;
    }

    public function setGenericUseCaseTestGeneratorRequestBuilder(
        GenericUseCaseTestGeneratorRequestBuilder $genericUseCaseTestGeneratorRequestBuilder
    ): void {
        $this->genericUseCaseTestGeneratorRequestBuilder = $genericUseCaseTestGeneratorRequestBuilder;
    }

    protected function generateGenericUseCase(string $domain, string $useCase): FileObject
    {
        return $this->genericUseCaseGenerator->generate(
            $this->genericUseCaseGeneratorRequestBuilder->create()->withDomain($domain)
                ->withUseCaseName($useCase)
                ->build()
        );
    }

    protected function generateGenericUseCaseTest(string $domain, string $useCase): FileObject
    {
        return $this->genericUseCaseTestGenerator->generate(
            $this->genericUseCaseTestGeneratorRequestBuilder->create()->withDomain($domain)
                ->withUseCaseName($useCase)
                ->build()
        );
    }
}
