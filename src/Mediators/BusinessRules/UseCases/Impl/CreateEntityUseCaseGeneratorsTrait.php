<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\EntityFactoryImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityFactoryImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\EntityFactoryGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\Request\EntityFactoryGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateRequestTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateRequestTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\CreateEntityUseCaseTestGeneratorRequestBuilder;

trait CreateEntityUseCaseGeneratorsTrait
{
    /** @var CreateEntityUseCaseGenerator */
    private $createEntityUseCaseGenerator;

    /** @var CreateEntityUseCaseGeneratorRequestBuilder */
    private $createEntityUseCaseGeneratorRequestBuilder;

    /** @var CreateEntityUseCaseRequestGenerator */
    private $createEntityUseCaseRequestGenerator;

    /** @var CreateEntityUseCaseRequestGeneratorRequestBuilder */
    private $createEntityUseCaseRequestGeneratorRequestBuilder;

    /** @var CreateEntityUseCaseTestGenerator */
    private $createEntityUseCaseTestGenerator;

    /** @var CreateEntityUseCaseTestGeneratorRequestBuilder */
    private $createEntityUseCaseTestGeneratorRequestBuilder;

    /** @var CreateRequestTraitGenerator */
    private $createRequestTraitGenerator;

    /** @var CreateRequestTraitGeneratorRequestBuilder */
    private $createRequestTraitGeneratorRequestBuilder;

    /** @var EntityFactoryGenerator */
    private $entityFactoryGenerator;

    /** @var EntityFactoryGeneratorRequestBuilder */
    private $entityFactoryGeneratorRequestBuilder;

    /** @var EntityFactoryImplGenerator */
    private $entityFactoryImplGenerator;

    /** @var EntityFactoryImplGeneratorRequestBuilder */
    private $entityFactoryImplGeneratorRequestBuilder;

    public function setCreateEntityUseCaseGenerator(
        Generator $createEntityUseCaseGenerator
    ): void {
        $this->createEntityUseCaseGenerator = $createEntityUseCaseGenerator;
    }

    public function setCreateEntityUseCaseGeneratorRequestBuilder(
        CreateEntityUseCaseGeneratorRequestBuilder $createEntityUseCaseGeneratorRequestBuilder
    ): void {
        $this->createEntityUseCaseGeneratorRequestBuilder = $createEntityUseCaseGeneratorRequestBuilder;
    }

    public function setCreateEntityUseCaseRequestGenerator(
        Generator $createEntityUseCaseRequestGenerator
    ): void {
        $this->createEntityUseCaseRequestGenerator = $createEntityUseCaseRequestGenerator;
    }

    public function setCreateEntityUseCaseRequestGeneratorRequestBuilder(
        CreateEntityUseCaseRequestGeneratorRequestBuilder $createEntityUseCaseRequestGeneratorRequestBuilder
    ): void {
        $this->createEntityUseCaseRequestGeneratorRequestBuilder = $createEntityUseCaseRequestGeneratorRequestBuilder;
    }

    public function setCreateEntityUseCaseTestGenerator(
        Generator $createEntityUseCaseTestGenerator
    ): void {
        $this->createEntityUseCaseTestGenerator = $createEntityUseCaseTestGenerator;
    }

    public function setCreateEntityUseCaseTestGeneratorRequestBuilder(
        CreateEntityUseCaseTestGeneratorRequestBuilder $createEntityUseCaseTestGeneratorRequestBuilder
    ): void {
        $this->createEntityUseCaseTestGeneratorRequestBuilder = $createEntityUseCaseTestGeneratorRequestBuilder;
    }

    public function setCreateRequestTraitGenerator(Generator $createRequestTraitGenerator): void
    {
        $this->createRequestTraitGenerator = $createRequestTraitGenerator;
    }

    public function setCreateRequestTraitGeneratorRequestBuilder(
        CreateRequestTraitGeneratorRequestBuilder $createRequestTraitGeneratorRequestBuilder
    ): void {
        $this->createRequestTraitGeneratorRequestBuilder = $createRequestTraitGeneratorRequestBuilder;
    }

    public function setEntityFactoryGenerator(Generator $entityFactoryGenerator): void
    {
        $this->entityFactoryGenerator = $entityFactoryGenerator;
    }

    public function setEntityFactoryGeneratorRequestBuilder(
        EntityFactoryGeneratorRequestBuilder $entityFactoryGeneratorRequestBuilder
    ): void {
        $this->entityFactoryGeneratorRequestBuilder = $entityFactoryGeneratorRequestBuilder;
    }

    public function setEntityFactoryImplGenerator(Generator $entityFactoryImplGenerator): void
    {
        $this->entityFactoryImplGenerator = $entityFactoryImplGenerator;
    }

    public function setEntityFactoryImplGeneratorRequestBuilder(
        EntityFactoryImplGeneratorRequestBuilder $entityFactoryImplGeneratorRequestBuilder
    ): void {
        $this->entityFactoryImplGeneratorRequestBuilder = $entityFactoryImplGeneratorRequestBuilder;
    }

    protected function generateCreateEntityUseCaseGenerator(string $className): FileObject
    {
        return $this->createEntityUseCaseGenerator->generate(
            $this->createEntityUseCaseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateCreateEntityUseCaseRequestGenerator(string $className): FileObject
    {
        return $this->createEntityUseCaseRequestGenerator->generate(
            $this->createEntityUseCaseRequestGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateCreateEntityUseCaseTestGenerator(string $className): FileObject
    {
        return $this->createEntityUseCaseTestGenerator->generate(
            $this->createEntityUseCaseTestGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateCreateRequestTraitGenerator(string $className): FileObject
    {
        return $this->createRequestTraitGenerator->generate(
            $this->createRequestTraitGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateEntityFactoryGenerator(string $className): FileObject
    {
        return $this->entityFactoryGenerator->generate(
            $this->entityFactoryGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateEntityFactoryImplGenerator(string $className): FileObject
    {
        return $this->entityFactoryImplGenerator->generate(
            $this->entityFactoryImplGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }
}
