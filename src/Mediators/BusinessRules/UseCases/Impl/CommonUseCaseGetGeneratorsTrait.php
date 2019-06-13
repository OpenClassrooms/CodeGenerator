<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\EntityRepositoryGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityNotFoundExceptionGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityGatewayGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Generator;
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

    /** @var FileObjectGateway */
    private $fileObjectGateway;

    /** @var InMemoryEntityGatewayGenerator */
    private $inMemoryEntityGatewayGenerator;

    /** @var InMemoryEntityGatewayGeneratorRequestBuilder */
    private $inMemoryEntityGatewayGeneratorRequestBuilder;

    /** @var UseCaseResponseDTOGenerator */
    private $useCaseResponseDTOGenerator;

    /** @var UseCaseResponseDTOGeneratorRequestBuilder */
    private $useCaseResponseDTOGeneratorRequestBuilder;

    /** @var UseCaseResponseGenerator */
    private $useCaseResponseGenerator;

    /** @var UseCaseResponseGeneratorRequestBuilder */
    private $useCaseResponseGeneratorRequestBuilder;

    /** @var UseCaseResponseTestCaseGenerator */
    private $useCaseResponseTestCaseGenerator;

    /** @var UseCaseResponseTestCaseGeneratorRequestBuilder */
    private $useCaseResponseTestCaseGeneratorRequestBuilder;

    /** @var UseCaseResponseTraitGenerator */
    private $useCaseResponseTraitGenerator;

    /** @var UseCaseResponseTraitGeneratorRequestBuilder */
    private $useCaseResponseTraitGeneratorRequestBuilder;

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

    public function setInMemoryEntityGatewayGenerator(Generator $inMemoryEntityGatewayGenerator): void
    {
        $this->inMemoryEntityGatewayGenerator = $inMemoryEntityGatewayGenerator;
    }

    public function setInMemoryEntityGatewayGeneratorRequestBuilder(
        InMemoryEntityGatewayGeneratorRequestBuilder $inMemoryEntityGatewayGeneratorRequestBuilder
    ): void {
        $this->inMemoryEntityGatewayGeneratorRequestBuilder = $inMemoryEntityGatewayGeneratorRequestBuilder;
    }

    public function setUseCaseResponseDTOGenerator(
        Generator $useCaseResponseDTOGenerator
    ): void {
        $this->useCaseResponseDTOGenerator = $useCaseResponseDTOGenerator;
    }

    public function setUseCaseResponseDTOGeneratorRequestBuilder(
        UseCaseResponseDTOGeneratorRequestBuilder $useCaseResponseDTOGeneratorRequestBuilder
    ): void {
        $this->useCaseResponseDTOGeneratorRequestBuilder = $useCaseResponseDTOGeneratorRequestBuilder;
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

    public function setUseCaseResponseTraitGenerator(
        Generator $useCaseResponseTraitGenerator
    ): void {
        $this->useCaseResponseTraitGenerator = $useCaseResponseTraitGenerator;
    }

    public function setUseCaseResponseTraitGeneratorRequestBuilder(
        UseCaseResponseTraitGeneratorRequestBuilder $useCaseResponseTraitGeneratorRequestBuilder
    ): void {
        $this->useCaseResponseTraitGeneratorRequestBuilder = $useCaseResponseTraitGeneratorRequestBuilder;
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

    protected function generateInMemoryEntityGatewayGenerator(string $className): FileObject
    {
        return $this->inMemoryEntityGatewayGenerator->generate(
            $this->inMemoryEntityGatewayGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateUseCaseResponseDTOGenerator(string $className): FileObject
    {
        return $this->useCaseResponseDTOGenerator->generate(
            $this->useCaseResponseDTOGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->withFields([])
                ->build()
        );
    }

    protected function generateUseCaseResponseTraitGenerator(string $className): FileObject
    {
        return $this->useCaseResponseTraitGenerator->generate(
            $this->useCaseResponseTraitGeneratorRequestBuilder
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
}
