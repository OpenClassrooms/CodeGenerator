<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseListItemResponseAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseListItemResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseListItemResponseDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseListItemResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseListItemResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\UseCaseListItemResponseMediator;

class UseCaseListItemResponseMediatorImpl implements UseCaseListItemResponseMediator
{
    /** @var UseCaseListItemResponseAssemblerGenerator */
    private $useCaseListItemResponseAssemblerGenerator;

    /** @var UseCaseListItemResponseAssemblerGeneratorRequestBuilder */
    private $useCaseListItemResponseAssemblerGeneratorRequestBuilder;

    /** @var UseCaseListItemResponseAssemblerImplGenerator */
    private $useCaseListItemResponseAssemblerImplGenerator;

    /** @var UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder */
    private $useCaseListItemResponseAssemblerImplGeneratorRequestBuilder;

    /** @var UseCaseListItemResponseAssemblerMockGenerator */
    private $useCaseListItemResponseAssemblerMockGenerator;

    /** @var UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder */
    private $useCaseListItemResponseAssemblerMockGeneratorRequestBuilder;

    /** @var UseCaseListItemResponseDTOGenerator */
    private $useCaseListItemResponseDTOGenerator;

    /** @var UseCaseListItemResponseDTOGeneratorRequestBuilder */
    private $useCaseListItemResponseDTOGeneratorRequestBuilder;

    /** @var UseCaseListItemResponseGenerator */
    private $useCaseListItemResponseGenerator;

    /** @var UseCaseListItemResponseGeneratorRequestBuilder */
    private $useCaseListItemResponseGeneratorRequestBuilder;

    /** @var UseCaseListItemResponseStubGenerator */
    private $useCaseListItemResponseStubGenerator;

    /** @var UseCaseListItemResponseStubGeneratorRequestBuilder */
    private $useCaseListItemResponseStubGeneratorRequestBuilder;

    /** @var UseCaseListItemResponseTestCaseGenerator */
    private $useCaseListItemResponseTestCaseGenerator;

    /** @var UseCaseListItemResponseTestCaseGeneratorRequestBuilder */
    private $useCaseListItemResponseTestCaseGeneratorRequestBuilder;

    public function generateUseCaseListItemResponseAssemblerGenerator(string $className): FileObject
    {
        return $this->useCaseListItemResponseAssemblerGenerator->generate(
            $this->useCaseListItemResponseAssemblerGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generateUseCaseListItemResponseAssemblerImplGenerator(string $className): FileObject
    {
        return $this->useCaseListItemResponseAssemblerImplGenerator->generate(
            $this->useCaseListItemResponseAssemblerImplGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    public function generateUseCaseListItemResponseAssemblerMockGenerator(string $className): FileObject
    {
        return $this->useCaseListItemResponseAssemblerMockGenerator->generate(
            $this->useCaseListItemResponseAssemblerMockGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generateUseCaseListItemResponseDTOGenerator(string $className): FileObject
    {
        return $this->useCaseListItemResponseDTOGenerator->generate(
            $this->useCaseListItemResponseDTOGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    public function generateUseCaseListItemResponseGenerator(string $className): FileObject
    {
        return $this->useCaseListItemResponseGenerator->generate(
            $this->useCaseListItemResponseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generateUseCaseListItemResponseStubGenerator(string $className): FileObject
    {
        return $this->useCaseListItemResponseStubGenerator->generate(
            $this->useCaseListItemResponseStubGeneratorRequestBuilder
                ->create()
                ->withClassName($className)
                ->withFields([])
                ->build()
        );
    }

    public function generateUseCaseListItemResponseTestCaseGenerator(string $className): FileObject
    {
        return $this->useCaseListItemResponseTestCaseGenerator->generate(
            $this->useCaseListItemResponseTestCaseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)->withFields([])
                ->build()
        );
    }

    public function setUseCaseListItemResponseAssemblerGenerator(
        Generator $useCaseListItemResponseAssemblerGenerator
    ): void {
        $this->useCaseListItemResponseAssemblerGenerator = $useCaseListItemResponseAssemblerGenerator;
    }

    public function setUseCaseListItemResponseAssemblerGeneratorRequestBuilder(
        UseCaseListItemResponseAssemblerGeneratorRequestBuilder $useCaseListItemResponseAssemblerGeneratorRequestBuilder
    ): void {
        $this->useCaseListItemResponseAssemblerGeneratorRequestBuilder = $useCaseListItemResponseAssemblerGeneratorRequestBuilder;
    }

    public function setUseCaseListItemResponseAssemblerImplGenerator(
        Generator $useCaseListItemResponseAssemblerImplGenerator
    ): void {
        $this->useCaseListItemResponseAssemblerImplGenerator = $useCaseListItemResponseAssemblerImplGenerator;
    }

    public function setUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder(
        UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder $useCaseListItemResponseAssemblerImplGeneratorRequestBuilder
    ): void {
        $this->useCaseListItemResponseAssemblerImplGeneratorRequestBuilder = $useCaseListItemResponseAssemblerImplGeneratorRequestBuilder;
    }

    public function setUseCaseListItemResponseAssemblerMockGenerator(
        Generator $useCaseListItemResponseAssemblerMockGenerator
    ): void {
        $this->useCaseListItemResponseAssemblerMockGenerator = $useCaseListItemResponseAssemblerMockGenerator;
    }

    public function setUseCaseListItemResponseAssemblerMockGeneratorRequestBuilder(
        UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder $useCaseListItemResponseAssemblerMockGeneratorRequestBuilder
    ): void {
        $this->useCaseListItemResponseAssemblerMockGeneratorRequestBuilder = $useCaseListItemResponseAssemblerMockGeneratorRequestBuilder;
    }

    public function setUseCaseListItemResponseDTOGenerator(
        Generator $useCaseListItemResponseDTOGenerator
    ): void {
        $this->useCaseListItemResponseDTOGenerator = $useCaseListItemResponseDTOGenerator;
    }

    public function setUseCaseListItemResponseDTOGeneratorRequestBuilder(
        UseCaseListItemResponseDTOGeneratorRequestBuilder $useCaseListItemResponseDTOGeneratorRequestBuilder
    ): void {
        $this->useCaseListItemResponseDTOGeneratorRequestBuilder = $useCaseListItemResponseDTOGeneratorRequestBuilder;
    }

    public function setUseCaseListItemResponseGenerator(
        Generator $useCaseListItemResponseGenerator
    ): void {
        $this->useCaseListItemResponseGenerator = $useCaseListItemResponseGenerator;
    }

    public function setUseCaseListItemResponseGeneratorRequestBuilder(
        UseCaseListItemResponseGeneratorRequestBuilder $useCaseListItemResponseGeneratorRequestBuilder
    ): void {
        $this->useCaseListItemResponseGeneratorRequestBuilder = $useCaseListItemResponseGeneratorRequestBuilder;
    }

    public function setUseCaseListItemResponseStubGenerator(
        Generator $useCaseListItemResponseStubGenerator
    ): void {
        $this->useCaseListItemResponseStubGenerator = $useCaseListItemResponseStubGenerator;
    }

    public function setUseCaseListItemResponseStubGeneratorRequestBuilder(
        UseCaseListItemResponseStubGeneratorRequestBuilder $useCaseListItemResponseStubGeneratorRequestBuilder
    ): void {
        $this->useCaseListItemResponseStubGeneratorRequestBuilder = $useCaseListItemResponseStubGeneratorRequestBuilder;
    }

    public function setUseCaseListItemResponseTestCaseGenerator(
        Generator $useCaseListItemResponseTestCaseGenerator
    ): void {
        $this->useCaseListItemResponseTestCaseGenerator = $useCaseListItemResponseTestCaseGenerator;
    }

    public function setUseCaseListItemResponseTestCaseGeneratorRequestBuilder(
        UseCaseListItemResponseTestCaseGeneratorRequestBuilder $useCaseListItemResponseTestCaseGeneratorRequestBuilder
    ): void {
        $this->useCaseListItemResponseTestCaseGeneratorRequestBuilder = $useCaseListItemResponseTestCaseGeneratorRequestBuilder;
    }
}
