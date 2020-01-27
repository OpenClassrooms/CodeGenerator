<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DeleteEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DeleteEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\DeleteEntityUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DeleteEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DeleteEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DeleteEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DeleteEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\DeleteEntityUseCaseTestGeneratorRequestBuilder;

trait DeleteEntityUseCaseGeneratorsTrait
{
    /** @var DeleteEntityUseCaseGenerator */
    private $editEntityUseCaseGenerator;

    /** @var DeleteEntityUseCaseGeneratorRequestBuilder */
    private $editEntityUseCaseGeneratorRequestBuilder;

    /** @var DeleteEntityUseCaseRequestBuilderGenerator */
    private $editEntityUseCaseRequestBuilderGenerator;

    /** @var DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder */
    private $editEntityUseCaseRequestBuilderGeneratorRequestBuilder;

    /** @var DeleteEntityUseCaseRequestBuilderImplGenerator */
    private $editEntityUseCaseRequestBuilderImplGenerator;

    /** @var DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder */
    private $editEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

    /** @var DeleteEntityUseCaseRequestDTOGenerator */
    private $editEntityUseCaseRequestDTOGenerator;

    /** @var DeleteEntityUseCaseRequestDTOGeneratorRequestBuilder */
    private $editEntityUseCaseRequestDTOGeneratorRequestBuilder;

    /** @var DeleteEntityUseCaseRequestGenerator */
    private $editEntityUseCaseRequestGenerator;

    /** @var DeleteEntityUseCaseRequestGeneratorRequestBuilder */
    private $editEntityUseCaseRequestGeneratorRequestBuilder;

    /** @var DeleteEntityUseCaseTestGenerator */
    private $editEntityUseCaseTestGenerator;

    /** @var DeleteEntityUseCaseTestGeneratorRequestBuilder */
    private $editEntityUseCaseTestGeneratorRequestBuilder;

    public function setDeleteEntityUseCaseGenerator(
        Generator $editEntityUseCaseGenerator
    ): void {
        $this->editEntityUseCaseGenerator = $editEntityUseCaseGenerator;
    }

    public function setDeleteEntityUseCaseGeneratorRequestBuilder(
        DeleteEntityUseCaseGeneratorRequestBuilder $editEntityUseCaseGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseGeneratorRequestBuilder = $editEntityUseCaseGeneratorRequestBuilder;
    }

    public function setDeleteEntityUseCaseRequestBuilderGenerator(
        Generator $editEntityUseCaseRequestBuilderGenerator
    ): void {
        $this->editEntityUseCaseRequestBuilderGenerator = $editEntityUseCaseRequestBuilderGenerator;
    }

    public function setDeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder(
        DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder $editEntityUseCaseRequestBuilderGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseRequestBuilderGeneratorRequestBuilder = $editEntityUseCaseRequestBuilderGeneratorRequestBuilder;
    }

    public function setDeleteEntityUseCaseRequestBuilderImplGenerator(
        Generator $editEntityUseCaseRequestBuilderImplGenerator
    ): void {
        $this->editEntityUseCaseRequestBuilderImplGenerator = $editEntityUseCaseRequestBuilderImplGenerator;
    }

    public function setDeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder(
        DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder $editEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseRequestBuilderImplGeneratorRequestBuilder = $editEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
    }

    public function setDeleteEntityUseCaseRequestDTOGenerator(
        Generator $editEntityUseCaseRequestDTOGenerator
    ): void {
        $this->editEntityUseCaseRequestDTOGenerator = $editEntityUseCaseRequestDTOGenerator;
    }

    public function setDeleteEntityUseCaseRequestDTOGeneratorRequestBuilder(
        DeleteEntityUseCaseRequestDTOGeneratorRequestBuilder $editEntityUseCaseRequestDTOGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseRequestDTOGeneratorRequestBuilder = $editEntityUseCaseRequestDTOGeneratorRequestBuilder;
    }

    public function setDeleteEntityUseCaseRequestGenerator(
        Generator $editEntityUseCaseRequestGenerator
    ): void {
        $this->editEntityUseCaseRequestGenerator = $editEntityUseCaseRequestGenerator;
    }

    public function setDeleteEntityUseCaseRequestGeneratorRequestBuilder(
        DeleteEntityUseCaseRequestGeneratorRequestBuilder $editEntityUseCaseRequestGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseRequestGeneratorRequestBuilder = $editEntityUseCaseRequestGeneratorRequestBuilder;
    }

    public function setDeleteEntityUseCaseTestGenerator(
        Generator $editEntityUseCaseTestGenerator
    ): void {
        $this->editEntityUseCaseTestGenerator = $editEntityUseCaseTestGenerator;
    }

    public function setDeleteEntityUseCaseTestGeneratorRequestBuilder(
        DeleteEntityUseCaseTestGeneratorRequestBuilder $editEntityUseCaseTestGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseTestGeneratorRequestBuilder = $editEntityUseCaseTestGeneratorRequestBuilder;
    }

    protected function generateDeleteEntityUseCaseGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseGenerator->generate(
            $this->editEntityUseCaseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateDeleteEntityUseCaseRequestBuilderGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseRequestBuilderGenerator->generate(
            $this->editEntityUseCaseRequestBuilderGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateDeleteEntityUseCaseRequestBuilderImplGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseRequestBuilderImplGenerator->generate(
            $this->editEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateDeleteEntityUseCaseRequestDTOGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseRequestDTOGenerator->generate(
            $this->editEntityUseCaseRequestDTOGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateDeleteEntityUseCaseRequestGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseRequestGenerator->generate(
            $this->editEntityUseCaseRequestGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateDeleteEntityUseCaseTestGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseTestGenerator->generate(
            $this->editEntityUseCaseTestGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }
}
