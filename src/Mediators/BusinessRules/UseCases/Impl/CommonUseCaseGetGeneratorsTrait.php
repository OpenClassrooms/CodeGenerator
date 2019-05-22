<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseResponseTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseGenerator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait CommonUseCaseGetGeneratorsTrait
{
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

    /** @var UseCaseResponseDTOGenerator */
    private $useCaseResponseDTOGenerator;

    /** @var UseCaseResponseDTOGeneratorRequestBuilder */
    private $useCaseResponseDTOGeneratorRequestBuilder;

    /** @var UseCaseResponseTestCaseGenerator */
    private $useCaseResponseTestCaseGenerator;

    /** @var UseCaseResponseTestCaseGeneratorRequestBuilder */
    private $useCaseResponseTestCaseGeneratorRequestBuilder;

    /** @var UseCaseResponseTraitGenerator */
    private $useCaseResponseTraitGenerator;

    /** @var UseCaseResponseTraitGeneratorRequestBuilder */
    private $useCaseResponseTraitGeneratorRequestBuilder;

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

    protected function generateGetEntityUseCaseRequestGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseRequestGenerator->generate(
            $this->getEntityUseCaseRequestGeneratorRequestBuilder
                ->create()
                ->withEntity($className)
                ->create()
        );
    }

    protected function generateGetEntityUseCaseRequestBuilderGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseRequestBuilderGenerator->generate(
            $this->getEntityUseCaseRequestBuilderGeneratorRequestBuilder
                ->create()
                ->withEntity($className)
                ->create()
        );
    }

    protected function generateGetEntityUseCaseRequestBuilderImplGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseRequestBuilderImplGenerator->generate(
            $this->getEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
                ->create()
                ->withEntity($className)
                ->create()
        );
    }

    protected function generateGetEntityUseCaseRequestDTOGenerator(string $className): FileObject
    {
        return $this->getEntityUseCaseRequestDTOGenerator->generate(
            $this->getEntityUseCaseRequestDTOGeneratorRequestBuilder
                ->create()
                ->withEntity($className)
                ->create()
        );
    }

    protected function generateUseCaseResponseDTOGenerator(string $className): FileObject
    {
        return $this->useCaseResponseDTOGenerator->generate(
            $this->useCaseResponseDTOGeneratorRequestBuilder
            ->create()
            ->withEntity($className)
            ->create()
        );
    }

    protected function generateUseCaseResponseTraitGenerator(string $className): FileObject
    {
        return $this->useCaseResponseTraitGenerator->generate(
            $this->useCaseResponseTraitGeneratorRequestBuilder
            ->create()
            ->withEntity($className)
            ->create()
        );
    }

    protected function generateUseCaseResponseTestCaseGenerator(string $className): FileObject
    {
        return $this->useCaseResponseTestCaseGenerator->generate(
            $this->useCaseResponseTestCaseGeneratorRequestBuilder
                ->create()
                ->withEntity($className)
                ->create()
        );
    }
}
