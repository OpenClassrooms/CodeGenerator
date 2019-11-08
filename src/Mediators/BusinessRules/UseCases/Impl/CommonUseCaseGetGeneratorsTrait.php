<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\EntityRepositoryGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityNotFoundExceptionGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityGatewayGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseAssemblerTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseCommonFieldTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\EntityStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\Request\InMemoryEntityGatewayGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseResponseTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseGenerator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait CommonUseCaseGetGeneratorsTrait
{
    /** @var EntityGatewayGenerator */
    private $entityGatewayGenerator;

    /** @var EntityGatewayGeneratorRequestBuilder */
    private $entityGatewayGeneratorRequestBuilder;

    /** @var EntityNotFoundExceptionGenerator */
    private $entityNotFoundExceptionGenerator;

    /** @var EntityNotFoundExceptionGeneratorRequestBuilder */
    private $entityNotFoundExceptionGeneratorRequestBuilder;

    /** @var EntityRepositoryGenerator */
    private $entityRepositoryGenerator;

    /** @var EntityRepositoryGeneratorRequestBuilder */
    private $entityRepositoryGeneratorRequestBuilder;

    /** @var EntityStubGenerator */
    private $entityStubGenerator;

    /** @var EntityStubGeneratorRequestBuilder */
    private $entityStubGeneratorRequestBuilder;

    /** @var InMemoryEntityGatewayGenerator */
    private $inMemoryEntityGatewayGenerator;

    /** @var InMemoryEntityGatewayGeneratorRequestBuilder */
    private $inMemoryEntityGatewayGeneratorRequestBuilder;

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

    public function setEntityGatewayGenerator(Generator $entityGatewayGenerator): void
    {
        $this->entityGatewayGenerator = $entityGatewayGenerator;
    }

    public function setEntityGatewayGeneratorRequestBuilder(
        EntityGatewayGeneratorRequestBuilder $entityGatewayGeneratorRequestBuilder
    ): void {
        $this->entityGatewayGeneratorRequestBuilder = $entityGatewayGeneratorRequestBuilder;
    }

    public function setEntityNotFoundExceptionGenerator(
        Generator $entityNotFoundExceptionGenerator
    ): void {
        $this->entityNotFoundExceptionGenerator = $entityNotFoundExceptionGenerator;
    }

    public function setEntityNotFoundExceptionGeneratorRequestBuilder(
        EntityNotFoundExceptionGeneratorRequestBuilder $entityNotFoundExceptionGeneratorRequestBuilder
    ): void {
        $this->entityNotFoundExceptionGeneratorRequestBuilder = $entityNotFoundExceptionGeneratorRequestBuilder;
    }

    public function setEntityRepositoryGenerator(Generator $entityRepositoryGenerator): void
    {
        $this->entityRepositoryGenerator = $entityRepositoryGenerator;
    }

    public function setEntityRepositoryGeneratorRequestBuilder(
        EntityRepositoryGeneratorRequestBuilder $entityRepositoryGeneratorRequestBuilder
    ): void {
        $this->entityRepositoryGeneratorRequestBuilder = $entityRepositoryGeneratorRequestBuilder;
    }

    public function setEntityStubGenerator(Generator $entityStubGenerator): void
    {
        $this->entityStubGenerator = $entityStubGenerator;
    }

    public function setEntityStubGeneratorRequestBuilder(
        EntityStubGeneratorRequestBuilder $entityGeneratorRequestBuilder
    ): void {
        $this->entityStubGeneratorRequestBuilder = $entityGeneratorRequestBuilder;
    }

    public function setInMemoryEntityGatewayGenerator(Generator $inMemoryEntityGatewayGenerator): void
    {
        $this->inMemoryEntityGatewayGenerator = $inMemoryEntityGatewayGenerator;
    }

    public function setInMemoryEntityGatewayGeneratorRequestBuilder(
        InMemoryEntityGatewayGeneratorRequestBuilder $inMemoryEntityGatewayGeneratorRequestBuilder
    ): void {
        $this->inMemoryEntityGatewayGeneratorRequestBuilder = $inMemoryEntityGatewayGeneratorRequestBuilder;
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

    protected function generateEntityGatewayGenerator(string $className): FileObject
    {
        return $this->entityGatewayGenerator->generate(
            $this->entityGatewayGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateEntityNotFoundExceptionGenerator(string $className): FileObject
    {
        return $this->entityNotFoundExceptionGenerator->generate(
            $this->entityNotFoundExceptionGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateEntityRepositoryGenerator(string $className): FileObject
    {
        return $this->entityRepositoryGenerator->generate(
            $this->entityRepositoryGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateEntityStubGenerator(string $className): FileObject
    {
        return $this->entityStubGenerator->generate(
            $this->entityStubGeneratorRequestBuilder
                ->create()
                ->withClassName($className)
                ->build()
        );
    }

    protected function generateInMemoryEntityGatewayGenerator(string $className): FileObject
    {
        return $this->inMemoryEntityGatewayGenerator->generate(
            $this->inMemoryEntityGatewayGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateUseCaseResponseAssemblerTraitGenerator(string $className): FileObject
    {
        return $this->useCaseResponseAssemblerTraitGenerator->generate(
            $this->useCaseResponseAssemblerTraitGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    protected function generateUseCaseResponseCommonFieldTraitGenerator(string $className): FileObject
    {
        return $this->useCaseResponseCommonFieldTraitGenerator->generate(
            $this->useCaseResponseCommonFieldTraitGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    protected function generateUseCaseResponseGenerator(string $className): FileObject
    {
        return $this->useCaseResponseGenerator->generate(
            $this->useCaseResponseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    protected function generateUseCaseResponseTestCaseGenerator(string $className): FileObject
    {
        return $this->useCaseResponseTestCaseGenerator->generate(
            $this->useCaseResponseTestCaseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }
}
