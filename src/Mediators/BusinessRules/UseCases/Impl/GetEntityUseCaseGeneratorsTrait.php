<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GetEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntityUseCaseTestGeneratorRequestBuilder;

trait GetEntityUseCaseGeneratorsTrait
{
    /** @var GetEntityUseCaseGenerator */
    private $getEntityUseCaseGenerator;

    /** @var GetEntityUseCaseGeneratorRequestBuilder */
    private $getEntityUseCaseGeneratorRequestBuilder;

    /** @var GetEntityUseCaseRequestGenerator */
    private $getEntityUseCaseRequestGenerator;

    /** @var GetEntityUseCaseRequestGeneratorRequestBuilder */
    private $getEntityUseCaseRequestGeneratorRequestBuilder;

    /** @var GetEntityUseCaseTestGenerator */
    private $getEntityUseCaseTestGenerator;

    /** @var GetEntityUseCaseTestGeneratorRequestBuilder */
    private $getEntityUseCaseTestGeneratorRequestBuilder;

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

    protected function generateGetEntityUseCaseGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseGenerator->generate(
            $this->getEntityUseCaseGeneratorRequestBuilder
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
}
