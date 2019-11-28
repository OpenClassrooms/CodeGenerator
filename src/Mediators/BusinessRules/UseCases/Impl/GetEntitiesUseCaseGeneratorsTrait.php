<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntitiesUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntitiesUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntitiesUseCaseTestGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait GetEntitiesUseCaseGeneratorsTrait
{
    /** @var GetEntitiesUseCaseGenerator */
    private $getEntitiesUseCaseGenerator;

    /** @var GetEntitiesUseCaseGeneratorRequestBuilder */
    private $getEntitiesUseCaseGeneratorRequestBuilder;

    /** @var GetEntitiesUseCaseRequestBuilderGenerator */
    private $getEntitiesUseCaseRequestBuilderGenerator;

    /** @var GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder */
    private $getEntitiesUseCaseRequestBuilderGeneratorRequestBuilder;

    /** @var GetEntitiesUseCaseRequestBuilderImplGenerator */
    private $getEntitiesUseCaseRequestBuilderImplGenerator;

    /** @var GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder */
    private $getEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder;

    /** @var GetEntitiesUseCaseRequestDTOGenerator */
    private $getEntitiesUseCaseRequestDTOGenerator;

    /** @var GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder */
    private $getEntitiesUseCaseRequestDTOGeneratorRequestBuilder;

    /** @var GetEntitiesUseCaseRequestGenerator */
    private $getEntitiesUseCaseRequestGenerator;

    /** @var GetEntitiesUseCaseRequestGeneratorRequestBuilder */
    private $getEntitiesUseCaseRequestGeneratorRequestBuilder;

    /** @var GetEntitiesUseCaseTestGenerator */
    private $getEntitiesUseCaseTestGenerator;

    /** @var GetEntitiesUseCaseTestGeneratorRequestBuilder */
    private $getEntitiesUseCaseTestGeneratorRequestBuilder;

    protected function generateGetEntitiesUseCaseGenerator(string $className): FileObject
    {
        return $this->getEntitiesUseCaseGenerator->generate(
            $this->getEntitiesUseCaseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateGetEntitiesUseCaseRequestBuilderGenerator(string $className): FileObject
    {
        return $this->getEntitiesUseCaseRequestBuilderGenerator->generate(
            $this->getEntitiesUseCaseRequestBuilderGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateGetEntitiesUseCaseRequestBuilderImplGenerator(string $className): FileObject
    {
        return $this->getEntitiesUseCaseRequestBuilderImplGenerator->generate(
            $this->getEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateGetEntitiesUseCaseRequestDTOGenerator(string $className): FileObject
    {
        return $this->getEntitiesUseCaseRequestDTOGenerator->generate(
            $this->getEntitiesUseCaseRequestDTOGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateGetEntitiesUseCaseRequestGenerator(string $className): FileObject
    {
        return $this->getEntitiesUseCaseRequestGenerator->generate(
            $this->getEntitiesUseCaseRequestGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateGetEntitiesUseCaseTestGenerator(string $className): FileObject
    {
        return $this->getEntitiesUseCaseTestGenerator->generate(
            $this->getEntitiesUseCaseTestGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function setGetEntitiesUseCaseGenerator(
        Generator $getEntitiesUseCaseGenerator
    ): void {
        $this->getEntitiesUseCaseGenerator = $getEntitiesUseCaseGenerator;
    }

    public function setGetEntitiesUseCaseGeneratorRequestBuilder(
        GetEntitiesUseCaseGeneratorRequestBuilder $getEntitiesUseCaseGeneratorRequestBuilder
    ): void {
        $this->getEntitiesUseCaseGeneratorRequestBuilder = $getEntitiesUseCaseGeneratorRequestBuilder;
    }

    public function setGetEntitiesUseCaseRequestBuilderGenerator(
        Generator $getEntitiesUseCaseRequestBuilderGenerator
    ): void {
        $this->getEntitiesUseCaseRequestBuilderGenerator = $getEntitiesUseCaseRequestBuilderGenerator;
    }

    public function setGetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder(
        GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder $getEntitiesUseCaseRequestBuilderGeneratorRequestBuilder
    ): void {
        $this->getEntitiesUseCaseRequestBuilderGeneratorRequestBuilder = $getEntitiesUseCaseRequestBuilderGeneratorRequestBuilder;
    }

    public function setGetEntitiesUseCaseRequestBuilderImplGenerator(
        Generator $getEntitiesUseCaseRequestBuilderImplGenerator
    ): void {
        $this->getEntitiesUseCaseRequestBuilderImplGenerator = $getEntitiesUseCaseRequestBuilderImplGenerator;
    }

    public function setGetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder(
        GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder $getEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder
    ): void {
        $this->getEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder = $getEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder;
    }

    public function setGetEntitiesUseCaseRequestDTOGenerator(
        Generator $getEntitiesUseCaseRequestDTOGenerator
    ): void {
        $this->getEntitiesUseCaseRequestDTOGenerator = $getEntitiesUseCaseRequestDTOGenerator;
    }

    public function setGetEntitiesUseCaseRequestDTOGeneratorRequestBuilder(
        GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder $getEntitiesUseCaseRequestDTOGeneratorRequestBuilder
    ): void {
        $this->getEntitiesUseCaseRequestDTOGeneratorRequestBuilder = $getEntitiesUseCaseRequestDTOGeneratorRequestBuilder;
    }

    public function setGetEntitiesUseCaseRequestGenerator(
        Generator $getEntitiesUseCaseRequestGenerator
    ): void {
        $this->getEntitiesUseCaseRequestGenerator = $getEntitiesUseCaseRequestGenerator;
    }

    public function setGetEntitiesUseCaseRequestGeneratorRequestBuilder(
        GetEntitiesUseCaseRequestGeneratorRequestBuilder $getEntitiesUseCaseRequestGeneratorRequestBuilder
    ): void {
        $this->getEntitiesUseCaseRequestGeneratorRequestBuilder = $getEntitiesUseCaseRequestGeneratorRequestBuilder;
    }

    public function setGetEntitiesUseCaseTestGenerator(
        Generator $getEntitiesUseCaseTestGenerator
    ): void {
        $this->getEntitiesUseCaseTestGenerator = $getEntitiesUseCaseTestGenerator;
    }

    public function setGetEntitiesUseCaseTestGeneratorRequestBuilder(
        GetEntitiesUseCaseTestGeneratorRequestBuilder $getEntitiesUseCaseTestGeneratorRequestBuilder
    ): void {
        $this->getEntitiesUseCaseTestGeneratorRequestBuilder = $getEntitiesUseCaseTestGeneratorRequestBuilder;
    }
}
