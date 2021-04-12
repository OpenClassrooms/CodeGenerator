<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\UseCaseDetailResponseMediator;

class UseCaseDetailResponseMediatorImpl implements UseCaseDetailResponseMediator
{
    private Generator $useCaseDetailResponseAssemblerGenerator;

    private UseCaseDetailResponseAssemblerGeneratorRequestBuilder $useCaseDetailResponseAssemblerGeneratorRequestBuilder;

    private Generator $useCaseDetailResponseAssemblerImplGenerator;

    private UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder $useCaseDetailResponseAssemblerImplGeneratorRequestBuilder;

    private Generator $useCaseDetailResponseAssemblerMockGenerator;

    private UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder $useCaseDetailResponseAssemblerMockGeneratorRequestBuilder;

    private Generator $useCaseDetailResponseDTOGenerator;

    private UseCaseDetailResponseDTOGeneratorRequestBuilder $useCaseDetailResponseDTOGeneratorRequestBuilder;

    private Generator $useCaseDetailResponseGenerator;

    private UseCaseDetailResponseGeneratorRequestBuilder $useCaseDetailResponseGeneratorRequestBuilder;

    private Generator $useCaseDetailResponseStubGenerator;

    private UseCaseDetailResponseStubGeneratorRequestBuilder $useCaseDetailResponseStubGeneratorRequestBuilder;

    private Generator $useCaseDetailResponseTestCaseGenerator;

    private UseCaseDetailResponseTestCaseGeneratorRequestBuilder $useCaseDetailResponseTestCaseGeneratorRequestBuilder;

    public function generateUseCaseDetailResponseAssemblerGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseAssemblerGenerator->generate(
            $this->useCaseDetailResponseAssemblerGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generateUseCaseDetailResponseAssemblerImplGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseAssemblerImplGenerator->generate(
            $this->useCaseDetailResponseAssemblerImplGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    public function generateUseCaseDetailResponseAssemblerMockGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseAssemblerMockGenerator->generate(
            $this->useCaseDetailResponseAssemblerMockGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generateUseCaseDetailResponseDTOGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseDTOGenerator->generate(
            $this->useCaseDetailResponseDTOGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    public function generateUseCaseDetailResponseGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseGenerator->generate(
            $this->useCaseDetailResponseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    public function generateUseCaseDetailResponseStubGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseStubGenerator->generate(
            $this->useCaseDetailResponseStubGeneratorRequestBuilder
                ->create()
                ->withResponseClassName($className)
                ->build()
        );
    }

    public function generateUseCaseDetailResponseTestCaseGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseTestCaseGenerator->generate(
            $this->useCaseDetailResponseTestCaseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    public function setUseCaseDetailResponseAssemblerGenerator(
        Generator $useCaseDetailResponseAssemblerGenerator
    ): void {
        $this->useCaseDetailResponseAssemblerGenerator = $useCaseDetailResponseAssemblerGenerator;
    }

    public function setUseCaseDetailResponseAssemblerGeneratorRequestBuilder(
        UseCaseDetailResponseAssemblerGeneratorRequestBuilder $useCaseDetailResponseAssemblerGeneratorRequestBuilder
    ): void {
        $this->useCaseDetailResponseAssemblerGeneratorRequestBuilder = $useCaseDetailResponseAssemblerGeneratorRequestBuilder;
    }

    public function setUseCaseDetailResponseAssemblerImplGenerator(
        Generator $useCaseDetailResponseAssemblerImplGenerator
    ): void {
        $this->useCaseDetailResponseAssemblerImplGenerator = $useCaseDetailResponseAssemblerImplGenerator;
    }

    public function setUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder(
        UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder $useCaseDetailResponseAssemblerImplGeneratorRequestBuilder
    ): void {
        $this->useCaseDetailResponseAssemblerImplGeneratorRequestBuilder = $useCaseDetailResponseAssemblerImplGeneratorRequestBuilder;
    }

    public function setUseCaseDetailResponseAssemblerMockGenerator(
        Generator $useCaseDetailResponseAssemblerMockGenerator
    ): void {
        $this->useCaseDetailResponseAssemblerMockGenerator = $useCaseDetailResponseAssemblerMockGenerator;
    }

    public function setUseCaseDetailResponseAssemblerMockGeneratorRequestBuilder(
        UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder $useCaseDetailResponseAssemblerMockGeneratorRequestBuilder
    ): void {
        $this->useCaseDetailResponseAssemblerMockGeneratorRequestBuilder = $useCaseDetailResponseAssemblerMockGeneratorRequestBuilder;
    }

    public function setUseCaseDetailResponseDTOGenerator(
        Generator $useCaseDetailResponseDTOGenerator
    ): void {
        $this->useCaseDetailResponseDTOGenerator = $useCaseDetailResponseDTOGenerator;
    }

    public function setUseCaseDetailResponseDTOGeneratorRequestBuilder(
        UseCaseDetailResponseDTOGeneratorRequestBuilder $useCaseDetailResponseDTOGeneratorRequestBuilder
    ): void {
        $this->useCaseDetailResponseDTOGeneratorRequestBuilder = $useCaseDetailResponseDTOGeneratorRequestBuilder;
    }

    public function setUseCaseDetailResponseGenerator(
        Generator $useCaseDetailResponseGenerator
    ): void {
        $this->useCaseDetailResponseGenerator = $useCaseDetailResponseGenerator;
    }

    public function setUseCaseDetailResponseGeneratorRequestBuilder(
        UseCaseDetailResponseGeneratorRequestBuilder $useCaseDetailResponseGeneratorRequestBuilder
    ): void {
        $this->useCaseDetailResponseGeneratorRequestBuilder = $useCaseDetailResponseGeneratorRequestBuilder;
    }

    public function setUseCaseDetailResponseStubGenerator(
        Generator $useCaseDetailResponseStubGenerator
    ): void {
        $this->useCaseDetailResponseStubGenerator = $useCaseDetailResponseStubGenerator;
    }

    public function setUseCaseDetailResponseStubGeneratorRequestBuilder(
        UseCaseDetailResponseStubGeneratorRequestBuilder $useCaseDetailResponseStubGeneratorRequestBuilder
    ): void {
        $this->useCaseDetailResponseStubGeneratorRequestBuilder = $useCaseDetailResponseStubGeneratorRequestBuilder;
    }

    public function setUseCaseDetailResponseTestCaseGenerator(
        Generator $useCaseDetailResponseTestCaseGenerator
    ): void {
        $this->useCaseDetailResponseTestCaseGenerator = $useCaseDetailResponseTestCaseGenerator;
    }

    public function setUseCaseDetailResponseTestCaseGeneratorRequestBuilder(
        UseCaseDetailResponseTestCaseGeneratorRequestBuilder $useCaseDetailResponseTestCaseGeneratorRequestBuilder
    ): void {
        $this->useCaseDetailResponseTestCaseGeneratorRequestBuilder = $useCaseDetailResponseTestCaseGeneratorRequestBuilder;
    }
}
