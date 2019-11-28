<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\EntityRepositoryGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityNotFoundExceptionGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityGatewayGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\EntityStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\Request\InMemoryEntityGatewayGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Entities\EntitiesMediator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EntitiesMediatorImpl implements EntitiesMediator
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

    public function generateEntityGatewayGenerator(string $className): FileObject
    {
        return $this->entityGatewayGenerator->generate(
            $this->entityGatewayGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generateEntityNotFoundExceptionGenerator(string $className): FileObject
    {
        return $this->entityNotFoundExceptionGenerator->generate(
            $this->entityNotFoundExceptionGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generateEntityRepositoryGenerator(string $className): FileObject
    {
        return $this->entityRepositoryGenerator->generate(
            $this->entityRepositoryGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generateEntityStubGenerator(string $className): FileObject
    {
        return $this->entityStubGenerator->generate(
            $this->entityStubGeneratorRequestBuilder
                ->create()
                ->withClassName($className)
                ->build()
        );
    }

    public function generateInMemoryEntityGatewayGenerator(string $className): FileObject
    {
        return $this->inMemoryEntityGatewayGenerator->generate(
            $this->inMemoryEntityGatewayGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

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
}
