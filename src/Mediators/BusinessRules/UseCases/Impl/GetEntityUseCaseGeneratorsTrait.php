<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GetEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntityUseCaseTestGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait GetEntityUseCaseGeneratorsTrait
{
    /** @var GetEntityUseCaseGenerator */
    private $getEntityUseCaseGenerator;

    /** @var GetEntityUseCaseGeneratorRequestBuilder */
    private $getEntityUseCaseGeneratorRequestBuilder;

    /** @var GetEntityUseCaseRequestBuilderGenerator */
    private $getEntityUseCaseRequestBuilderGenerator;

    /** @var GetEntityUseCaseRequestBuilderGeneratorRequestBuilder */
    private $getEntityUseCaseRequestBuilderGeneratorRequestBuilder;

    /** @var GetEntityUseCaseRequestBuilderImplGenerator */
    private $getEntityUseCaseRequestBuilderImplGenerator;

    /** @var GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder */
    private $getEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

    /** @var GetEntityUseCaseRequestDTOGenerator */
    private $getEntityUseCaseRequestDTOGenerator;

    /** @var GetEntityUseCaseRequestDTOGeneratorRequestBuilder */
    private $getEntityUseCaseRequestDTOGeneratorRequestBuilder;

    /** @var GetEntityUseCaseRequestGenerator */
    private $getEntityUseCaseRequestGenerator;

    /** @var GetEntityUseCaseRequestGeneratorRequestBuilder */
    private $getEntityUseCaseRequestGeneratorRequestBuilder;

    /** @var GetEntityUseCaseTestGenerator */
    private $getEntityUseCaseTestGenerator;

    /** @var GetEntityUseCaseTestGeneratorRequestBuilder */
    private $getEntityUseCaseTestGeneratorRequestBuilder;

    protected function generateGetEntityUseCaseGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseGenerator->generate(
            $this->getEntityUseCaseGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    protected function generateGetEntityUseCaseRequestBuilderGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseRequestBuilderGenerator->generate(
            $this->getEntityUseCaseRequestBuilderGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
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

    protected function generateGetEntityUseCaseRequestGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseRequestGenerator->generate(
            $this->getEntityUseCaseRequestGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
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

    public function setGetEntityUseCaseGenerator(
        Generator $getEntityUseCaseGenerator
    ): void {
        $this->getEntityUseCaseGenerator = $getEntityUseCaseGenerator;
    }

    public function setGetEntityUseCaseGeneratorRequestBuilder(
        GetEntityUseCaseGeneratorRequestBuilder $getEntityUseCaseGeneratorRequestBuilder
    ): void {
        $this->getEntityUseCaseGeneratorRequestBuilder = $getEntityUseCaseGeneratorRequestBuilder;
    }

    public function setGetEntityUseCaseRequestBuilderGenerator(
        Generator $getEntityUseCaseRequestBuilderGenerator
    ): void {
        $this->getEntityUseCaseRequestBuilderGenerator = $getEntityUseCaseRequestBuilderGenerator;
    }

    public function setGetEntityUseCaseRequestBuilderGeneratorRequestBuilder(
        GetEntityUseCaseRequestBuilderGeneratorRequestBuilder $getEntityUseCaseRequestBuilderGeneratorRequestBuilder
    ): void {
        $this->getEntityUseCaseRequestBuilderGeneratorRequestBuilder = $getEntityUseCaseRequestBuilderGeneratorRequestBuilder;
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

    public function setGetEntityUseCaseRequestGenerator(
        Generator $getEntityUseCaseRequestGenerator
    ): void {
        $this->getEntityUseCaseRequestGenerator = $getEntityUseCaseRequestGenerator;
    }

    public function setGetEntityUseCaseRequestGeneratorRequestBuilder(
        GetEntityUseCaseRequestGeneratorRequestBuilder $getEntityUseCaseRequestGeneratorRequestBuilder
    ): void {
        $this->getEntityUseCaseRequestGeneratorRequestBuilder = $getEntityUseCaseRequestGeneratorRequestBuilder;
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
}
