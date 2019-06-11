<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseDetailResponseAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseDetailResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseDetailResponseAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseDetailResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseDetailResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GetEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntityUseCaseTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseGenerator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait GetEntityUseCaseGeneratorsTrait
{
    /** @var GetEntityUseCaseGenerator */
    private $getEntityUseCaseGenerator;

    /** @var GetEntityUseCaseGeneratorRequestBuilder */
    private $getEntityUseCaseGeneratorRequestBuilder;

    /** @var GetEntityUseCaseRequestBuilderImplGenerator */
    private $getEntityUseCaseRequestBuilderImplGenerator;

    /** @var GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder */
    private $getEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

    /** @var GetEntityUseCaseRequestDTOGenerator */
    private $getEntityUseCaseRequestDTOGenerator;

    /** @var GetEntityUseCaseRequestDTOGeneratorRequestBuilder */
    private $getEntityUseCaseRequestDTOGeneratorRequestBuilder;

    /** @var GetEntityUseCaseTestGenerator */
    private $getEntityUseCaseTestGenerator;

    /** @var GetEntityUseCaseTestGeneratorRequestBuilder */
    private $getEntityUseCaseTestGeneratorRequestBuilder;

    /** @var UseCaseDetailResponseAssemblerGenerator */
    private $useCaseDetailResponseAssemblerGenerator;

    /** @var UseCaseDetailResponseAssemblerGeneratorRequestBuilder */
    private $useCaseDetailResponseAssemblerGeneratorRequestBuilder;

    /** @var UseCaseDetailResponseAssemblerImplGenerator */
    private $useCaseDetailResponseAssemblerImplGenerator;

    /** @var UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder */
    private $useCaseDetailResponseAssemblerImplGeneratorRequestBuilder;

    /** @var UseCaseDetailResponseAssemblerMockGenerator */
    private $useCaseDetailResponseAssemblerMockGenerator;

    /** @var UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder */
    private $useCaseDetailResponseAssemblerMockGeneratorRequestBuilder;

    /** @var UseCaseDetailResponseDTOGenerator */
    private $useCaseDetailResponseDTOGenerator;

    /** @var UseCaseDetailResponseDTOGeneratorRequestBuilder */
    private $useCaseDetailResponseDTOGeneratorRequestBuilder;

    /** @var UseCaseDetailResponseGenerator */
    private $useCaseDetailResponseGenerator;

    /** @var UseCaseDetailResponseGeneratorRequestBuilder */
    private $useCaseDetailResponseGeneratorRequestBuilder;

    /** @var UseCaseDetailResponseStubGenerator */
    private $useCaseDetailResponseStubGenerator;

    /** @var UseCaseDetailResponseStubGeneratorRequestBuilder */
    private $useCaseDetailResponseStubGeneratorRequestBuilder;

    /** @var UseCaseDetailResponseTestCaseGenerator */
    private $useCaseDetailResponseTestCaseGenerator;

    /** @var UseCaseDetailResponseTestCaseGeneratorRequestBuilder */
    private $useCaseDetailResponseTestCaseGeneratorRequestBuilder;

    public function setGetEntityUseCaseGenerator(
        Generator $getEntityUseCaseGenerator
    ): void {
        $this->getEntityUseCaseGenerator = $getEntityUseCaseGenerator;
    }

    public function setGetEntityUseCaseRequestBuilderImplGenerator(
        Generator $getEntityUseCaseRequestBuilderImplGenerator
    ): void {
        $this->getEntityUseCaseRequestBuilderImplGenerator = $getEntityUseCaseRequestBuilderImplGenerator;
    }

    public function setGetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder(
        GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder $getEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
    ): void {
        $this->getEntityUseCaseRequestBuilderImplGeneratorRequestBuilder = $getEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
    }

    public function setGetEntityUseCaseRequestDTOGenerator(
        Generator $getEntityUseCaseRequestDTOGenerator
    ): void {
        $this->getEntityUseCaseRequestDTOGenerator = $getEntityUseCaseRequestDTOGenerator;
    }

    public function setGetEntityUseCaseRequestDTOGeneratorRequestBuilder(
        GetEntityUseCaseRequestDTOGeneratorRequestBuilder $getEntityUseCaseRequestDTOGeneratorRequestBuilder
    ): void {
        $this->getEntityUseCaseRequestDTOGeneratorRequestBuilder = $getEntityUseCaseRequestDTOGeneratorRequestBuilder;
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

    public function setGetEntityUseCaseGeneratorRequestBuilder(
        GetEntityUseCaseGeneratorRequestBuilder $getEntityUseCaseGeneratorRequestBuilder
    ): void {
        $this->getEntityUseCaseGeneratorRequestBuilder = $getEntityUseCaseGeneratorRequestBuilder;
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

    public function setGetEntityUseCaseTestGenerator(
        Generator $getEntityUseCaseTestGenerator
    ): void {
        $this->getEntityUseCaseTestGenerator = $getEntityUseCaseTestGenerator;
    }

    public function setGetEntityUseCaseTestGeneratorRequestBuilder(
        GetEntityUseCaseTestGeneratorRequestBuilder $getEntityUseCaseTestGeneratorRequestBuilder
    ): void {
        $this->getEntityUseCaseTestGeneratorRequestBuilder = $getEntityUseCaseTestGeneratorRequestBuilder;
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

    protected function generateGetEntityUseCaseRequestBuilderImplGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseRequestBuilderImplGenerator->generate(
            $this->getEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateGetEntityUseCaseRequestDTOGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseRequestDTOGenerator->generate(
            $this->getEntityUseCaseRequestDTOGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateUseCaseDetailResponseAssemblerGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseAssemblerGenerator->generate(
            $this->useCaseDetailResponseAssemblerGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateUseCaseDetailResponseGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseGenerator->generate(
            $this->useCaseDetailResponseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    protected function generateGetEntityUseCaseGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseGenerator->generate(
            $this->getEntityUseCaseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateUseCaseDetailResponseAssemblerImplGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseAssemblerImplGenerator->generate(
            $this->useCaseDetailResponseAssemblerImplGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    protected function generateUseCaseDetailResponseDTOGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseDTOGenerator->generate(
            $this->useCaseDetailResponseDTOGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    protected function generateUseCaseDetailResponseStubGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseStubGenerator->generate(
            $this->useCaseDetailResponseStubGeneratorRequestBuilder
                ->create()
                ->withResponseClassName($className)
                ->build()
        );
    }

    protected function generateGetEntityUseCaseTestGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseTestGenerator->generate(
            $this->getEntityUseCaseTestGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateUseCaseDetailResponseAssemblerMockGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseAssemblerMockGenerator->generate(
            $this->useCaseDetailResponseAssemblerMockGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateUseCaseDetailResponseTestCaseGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseTestCaseGenerator->generate(
            $this->useCaseDetailResponseTestCaseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }
}
