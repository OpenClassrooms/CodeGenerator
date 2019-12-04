<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\EditEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\EditEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\EditEntityUseCaseRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\EditEntityUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EditEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EditEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EditEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\EditEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\EditEntityUseCaseTestGeneratorRequestBuilder;

trait EditEntityUseCaseGeneratorsTrait
{
    /** @var EditEntityUseCaseGenerator */
    private $editEntityUseCaseGenerator;

    /** @var EditEntityUseCaseGeneratorRequestBuilder */
    private $editEntityUseCaseGeneratorRequestBuilder;

    /** @var EditEntityUseCaseRequestBuilderGenerator */
    private $editEntityUseCaseRequestBuilderGenerator;

    /** @var EditEntityUseCaseRequestBuilderGeneratorRequestBuilder */
    private $editEntityUseCaseRequestBuilderGeneratorRequestBuilder;

    /** @var EditEntityUseCaseRequestBuilderImplGenerator */
    private $editEntityUseCaseRequestBuilderImplGenerator;

    /** @var EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder */
    private $editEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

    /** @var EditEntityUseCaseRequestDTOGenerator */
    private $editEntityUseCaseRequestDTOGenerator;

    /** @var EditEntityUseCaseRequestDTOGeneratorRequestBuilder */
    private $editEntityUseCaseRequestDTOGeneratorRequestBuilder;

    /** @var EditEntityUseCaseRequestGenerator */
    private $editEntityUseCaseRequestGenerator;

    /** @var EditEntityUseCaseRequestGeneratorRequestBuilder */
    private $editEntityUseCaseRequestGeneratorRequestBuilder;

    /** @var EditEntityUseCaseTestGenerator */
    private $editEntityUseCaseTestGenerator;

    /** @var EditEntityUseCaseTestGeneratorRequestBuilder */
    private $editEntityUseCaseTestGeneratorRequestBuilder;

    protected function generateEditEntityUseCaseGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseGenerator->generate(
            $this->editEntityUseCaseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateEditEntityUseCaseRequestBuilderGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseRequestBuilderGenerator->generate(
            $this->editEntityUseCaseRequestBuilderGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateEditEntityUseCaseRequestBuilderImplGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseRequestBuilderImplGenerator->generate(
            $this->editEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateEditEntityUseCaseRequestDTOGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseRequestDTOGenerator->generate(
            $this->editEntityUseCaseRequestDTOGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateEditEntityUseCaseRequestGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseRequestGenerator->generate(
            $this->editEntityUseCaseRequestGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateEditEntityUseCaseTestGenerator(string $className): FileObject
    {
        return $this->editEntityUseCaseTestGenerator->generate(
            $this->editEntityUseCaseTestGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function setEditEntityUseCaseGenerator(
        Generator $editEntityUseCaseGenerator
    ): void {
        $this->editEntityUseCaseGenerator = $editEntityUseCaseGenerator;
    }

    public function setEditEntityUseCaseGeneratorRequestBuilder(
        EditEntityUseCaseGeneratorRequestBuilder $editEntityUseCaseGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseGeneratorRequestBuilder = $editEntityUseCaseGeneratorRequestBuilder;
    }

    public function setEditEntityUseCaseRequestBuilderGenerator(
        Generator $editEntityUseCaseRequestBuilderGenerator
    ): void {
        $this->editEntityUseCaseRequestBuilderGenerator = $editEntityUseCaseRequestBuilderGenerator;
    }

    public function setEditEntityUseCaseRequestBuilderGeneratorRequestBuilder(
        EditEntityUseCaseRequestBuilderGeneratorRequestBuilder $editEntityUseCaseRequestBuilderGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseRequestBuilderGeneratorRequestBuilder = $editEntityUseCaseRequestBuilderGeneratorRequestBuilder;
    }

    public function setEditEntityUseCaseRequestBuilderImplGenerator(
        Generator $editEntityUseCaseRequestBuilderImplGenerator
    ): void {
        $this->editEntityUseCaseRequestBuilderImplGenerator = $editEntityUseCaseRequestBuilderImplGenerator;
    }

    public function setEditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder(
        EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder $editEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseRequestBuilderImplGeneratorRequestBuilder = $editEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
    }

    public function setEditEntityUseCaseRequestDTOGenerator(
        Generator $editEntityUseCaseRequestDTOGenerator
    ): void {
        $this->editEntityUseCaseRequestDTOGenerator = $editEntityUseCaseRequestDTOGenerator;
    }

    public function setEditEntityUseCaseRequestDTOGeneratorRequestBuilder(
        EditEntityUseCaseRequestDTOGeneratorRequestBuilder $editEntityUseCaseRequestDTOGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseRequestDTOGeneratorRequestBuilder = $editEntityUseCaseRequestDTOGeneratorRequestBuilder;
    }

    public function setEditEntityUseCaseRequestGenerator(
        Generator $editEntityUseCaseRequestGenerator
    ): void {
        $this->editEntityUseCaseRequestGenerator = $editEntityUseCaseRequestGenerator;
    }

    public function setEditEntityUseCaseRequestGeneratorRequestBuilder(
        EditEntityUseCaseRequestGeneratorRequestBuilder $editEntityUseCaseRequestGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseRequestGeneratorRequestBuilder = $editEntityUseCaseRequestGeneratorRequestBuilder;
    }

    public function setEditEntityUseCaseTestGenerator(
        Generator $editEntityUseCaseTestGenerator
    ): void {
        $this->editEntityUseCaseTestGenerator = $editEntityUseCaseTestGenerator;
    }

    public function setEditEntityUseCaseTestGeneratorRequestBuilder(
        EditEntityUseCaseTestGeneratorRequestBuilder $editEntityUseCaseTestGeneratorRequestBuilder
    ): void {
        $this->editEntityUseCaseTestGeneratorRequestBuilder = $editEntityUseCaseTestGeneratorRequestBuilder;
    }
}
