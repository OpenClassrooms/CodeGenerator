<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseAssemblerTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseCommonFieldTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseResponseTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\UseCaseResponseCommonMediator;

class UseCaseResponseCommonMediatorImpl implements UseCaseResponseCommonMediator
{
    /** @var UseCaseResponseAssemblerTraitGenerator */
    private $useCaseResponseAssemblerTraitGenerator;

    /** @var UseCaseResponseAssemblerTraitGeneratorRequestBuilder */
    private $useCaseResponseAssemblerTraitGeneratorRequestBuilder;

    /** @var UseCaseResponseCommonFieldTraitGenerator */
    private $useCaseResponseCommonFieldTraitGenerator;

    /** @var UseCaseResponseCommonFieldTraitGeneratorRequestBuilder */
    private $useCaseResponseCommonFieldTraitGeneratorRequestBuilder;

    /** @var UseCaseResponseGenerator */
    private $useCaseResponseGenerator;

    /** @var UseCaseResponseGeneratorRequestBuilder */
    private $useCaseResponseGeneratorRequestBuilder;

    /** @var UseCaseResponseTestCaseGenerator */
    private $useCaseResponseTestCaseGenerator;

    /** @var UseCaseResponseTestCaseGeneratorRequestBuilder */
    private $useCaseResponseTestCaseGeneratorRequestBuilder;

    public function generateUseCaseResponseAssemblerTraitGenerator(string $className): FileObject
    {
        return $this->useCaseResponseAssemblerTraitGenerator->generate(
            $this->useCaseResponseAssemblerTraitGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    public function generateUseCaseResponseCommonFieldTraitGenerator(string $className): FileObject
    {
        return $this->useCaseResponseCommonFieldTraitGenerator->generate(
            $this->useCaseResponseCommonFieldTraitGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    public function generateUseCaseResponseGenerator(string $className): FileObject
    {
        return $this->useCaseResponseGenerator->generate(
            $this->useCaseResponseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    public function generateUseCaseResponseTestCaseGenerator(string $className): FileObject
    {
        return $this->useCaseResponseTestCaseGenerator->generate(
            $this->useCaseResponseTestCaseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    public function setUseCaseResponseAssemblerTraitGenerator(
        Generator $useCaseResponseAssemblerTraitGenerator
    ): void {
        $this->useCaseResponseAssemblerTraitGenerator = $useCaseResponseAssemblerTraitGenerator;
    }

    public function setUseCaseResponseAssemblerTraitGeneratorRequestBuilder(
        UseCaseResponseAssemblerTraitGeneratorRequestBuilder $useCaseResponseAssemblerTraitGeneratorRequestBuilder
    ): void {
        $this->useCaseResponseAssemblerTraitGeneratorRequestBuilder = $useCaseResponseAssemblerTraitGeneratorRequestBuilder;
    }

    public function setUseCaseResponseCommonFieldTraitGenerator(
        Generator $useCaseResponseCommonFieldTraitGenerator
    ): void {
        $this->useCaseResponseCommonFieldTraitGenerator = $useCaseResponseCommonFieldTraitGenerator;
    }

    public function setUseCaseResponseCommonFieldTraitGeneratorRequestBuilder(
        UseCaseResponseCommonFieldTraitGeneratorRequestBuilder $useCaseResponseCommonFieldTraitGeneratorRequestBuilder
    ): void {
        $this->useCaseResponseCommonFieldTraitGeneratorRequestBuilder = $useCaseResponseCommonFieldTraitGeneratorRequestBuilder;
    }

    public function setUseCaseResponseGenerator(Generator $useCaseResponseGenerator): void
    {
        $this->useCaseResponseGenerator = $useCaseResponseGenerator;
    }

    public function setUseCaseResponseGeneratorRequestBuilder(
        UseCaseResponseGeneratorRequestBuilder $useCaseResponseGeneratorRequestBuilder
    ): void {
        $this->useCaseResponseGeneratorRequestBuilder = $useCaseResponseGeneratorRequestBuilder;
    }

    public function setUseCaseResponseTestCaseGenerator(
        Generator $useCaseResponseTestCaseGenerator
    ): void {
        $this->useCaseResponseTestCaseGenerator = $useCaseResponseTestCaseGenerator;
    }

    public function setUseCaseResponseTestCaseGeneratorRequestBuilder(
        UseCaseResponseTestCaseGeneratorRequestBuilder $useCaseResponseTestCaseGeneratorRequestBuilder
    ): void {
        $this->useCaseResponseTestCaseGeneratorRequestBuilder = $useCaseResponseTestCaseGeneratorRequestBuilder;
    }
}
