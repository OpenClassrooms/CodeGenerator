<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelAssemblerTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\EntityImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelDetailAssemblerTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\EntityStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseDetailResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseListItemResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelDetailStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelListItemStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelTestCaseGenerator;

trait ViewModelGeneratorsTrait
{
    /** @var EntityImplGenerator */
    private $entityImplGenerator;

    /** @var EntityImplGeneratorRequestBuilder */
    private $entityImplGeneratorRequestBuilder;

    /** @var EntityStubGenerator */
    private $entityStubGenerator;

    /** @var EntityStubGeneratorRequestBuilder */
    private $entityStubGeneratorRequestBuilder;

    /** @var UseCaseDetailResponseStubGenerator */
    private $useCaseDetailResponseStubGenerator;

    /** @var UseCaseDetailResponseStubGeneratorRequestBuilder */
    private $useCaseDetailResponseStubGeneratorRequestBuilder;

    /** @var UseCaseListItemResponseStubGenerator */
    private $useCaseListItemResponseStubGenerator;

    /** @var UseCaseListItemResponseStubGeneratorRequestBuilder */
    private $useCaseListItemResponseStubGeneratorRequestBuilder;

    /** @var ViewModelDetailAssemblerGenerator */
    private $viewModelDetailAssemblerGenerator;

    /** @var ViewModelDetailAssemblerGeneratorRequestBuilder */
    private $viewModelDetailAssemblerGeneratorRequestBuilder;

    /** @var ViewModelDetailAssemblerTestGenerator */
    private $viewModelDetailAssemblerTestGenerator;

    /** @var ViewModelDetailAssemblerImplTestGeneratorRequestBuilder */
    private $viewModelDetailAssemblerTestGeneratorRequestBuilder;

    /** @var ViewModelDetailGenerator */
    private $viewModelDetailGenerator;

    /** @var ViewModelDetailGeneratorRequestBuilder */
    private $viewModelDetailGeneratorRequestBuilder;

    /** @var ViewModelDetailStubGenerator */
    private $viewModelDetailStubGenerator;

    /** @var ViewModelDetailStubGeneratorRequestBuilder */
    private $viewModelDetailStubGeneratorRequestBuilder;

    /** @var ViewModelGenerator */
    private $viewModelGenerator;

    /** @var ViewModelGeneratorRequestBuilder */
    private $viewModelGeneratorRequestBuilder;

    /** @var ViewModelListItemAssemblerGenerator */
    private $viewModelListItemAssemblerGenerator;

    /** @var ViewModelListItemAssemblerGeneratorRequestBuilder */
    private $viewModelListItemAssemblerGeneratorRequestBuilder;

    /** @var ViewModelListItemAssemblerImplTestGenerator */
    private $viewModelListItemAssemblerTestGenerator;

    /** @var ViewModelListItemAssemblerImplTestGeneratorRequestBuilder */
    private $viewModelListItemAssemblerTestGeneratorRequestBuilder;

    /** @var ViewModelListItemGenerator */
    private $viewModelListItemGenerator;

    /** @var ViewModelListItemGeneratorRequestBuilder */
    private $viewModelListItemGeneratorRequestBuilder;

    /** @var ViewModelListItemStubGenerator */
    private $viewModelListItemStubGenerator;

    /** @var ViewModelListItemStubGeneratorRequestBuilder */
    private $viewModelListItemStubGeneratorRequestBuilder;

    public function setEntityImplGenerator($entityImplGenerator): void
    {
        $this->entityImplGenerator = $entityImplGenerator;
    }

    public function setEntityImplGeneratorRequestBuilder($entityImplGeneratorRequestBuilder): void
    {
        $this->entityImplGeneratorRequestBuilder = $entityImplGeneratorRequestBuilder;
    }

    public function setEntityStubGenerator(Generator $entityStubGenerator): void
    {
        $this->entityStubGenerator = $entityStubGenerator;
    }

    public function setEntityStubGeneratorRequestBuilder(
        EntityStubGeneratorRequestBuilder $entityStubGeneratorRequestBuilder
    ): void {
        $this->entityStubGeneratorRequestBuilder = $entityStubGeneratorRequestBuilder;
    }

    public function setUseCaseDetailResponseStubGenerator(
        Generator $useCaseDetailResponseStubGenerator
    ): void {
        $this->useCaseDetailResponseStubGenerator = $useCaseDetailResponseStubGenerator;
    }

    public function setUseCaseDetailResponseStubGeneratorRequestBuilder(
        UseCaseDetailResponseStubGeneratorRequestBuilder $useCaseDetailResponseStubGeneratorRequestBuilder
    ): void {
        $this->useCaseDetailResponseStubGeneratorRequestBuilder = $useCaseDetailResponseStubGeneratorRequestBuilder;
    }

    public function setUseCaseListItemResponseStubGenerator(
        Generator $useCaseListItemResponseStubGenerator
    ): void {
        $this->useCaseListItemResponseStubGenerator = $useCaseListItemResponseStubGenerator;
    }

    public function setUseCaseListItemResponseStubGeneratorRequestBuilder(
        UseCaseListItemResponseStubGeneratorRequestBuilder $useCaseListItemResponseStubGeneratorRequestBuilder
    ): void {
        $this->useCaseListItemResponseStubGeneratorRequestBuilder = $useCaseListItemResponseStubGeneratorRequestBuilder;
    }

    public function setViewModelDetailAssemblerGenerator($viewModelDetailAssemblerGenerator): void
    {
        $this->viewModelDetailAssemblerGenerator = $viewModelDetailAssemblerGenerator;
    }

    public function setViewModelDetailAssemblerGeneratorRequestBuilder(
        $viewModelDetailAssemblerGeneratorRequestBuilder
    ): void {
        $this->viewModelDetailAssemblerGeneratorRequestBuilder = $viewModelDetailAssemblerGeneratorRequestBuilder;
    }

    public function setViewModelDetailAssemblerTestGenerator(
        Generator $viewModelDetailAssemblerTestGenerator
    ): void {
        $this->viewModelDetailAssemblerTestGenerator = $viewModelDetailAssemblerTestGenerator;
    }

    public function setViewModelDetailAssemblerTestGeneratorRequestBuilder(
        ViewModelDetailAssemblerImplTestGeneratorRequestBuilder $viewModelDetailAssemblerTestGeneratorRequestBuilder
    ): void {
        $this->viewModelDetailAssemblerTestGeneratorRequestBuilder = $viewModelDetailAssemblerTestGeneratorRequestBuilder;
    }

    public function setViewModelDetailGenerator(Generator $viewModelDetailGenerator): void
    {
        $this->viewModelDetailGenerator = $viewModelDetailGenerator;
    }

    public function setViewModelDetailGeneratorRequestBuilder(
        ViewModelDetailGeneratorRequestBuilder $viewModelDetailGeneratorRequestBuilder
    ): void {
        $this->viewModelDetailGeneratorRequestBuilder = $viewModelDetailGeneratorRequestBuilder;
    }

    public function setViewModelDetailStubGenerator(Generator $viewModelDetailStubGenerator): void
    {
        $this->viewModelDetailStubGenerator = $viewModelDetailStubGenerator;
    }

    public function setViewModelDetailStubGeneratorRequestBuilder(
        ViewModelDetailStubGeneratorRequestBuilder $viewModelDetailStubGeneratorRequestBuilder
    ): void {
        $this->viewModelDetailStubGeneratorRequestBuilder = $viewModelDetailStubGeneratorRequestBuilder;
    }

    public function setViewModelGenerator(Generator $viewModelGenerator): void
    {
        $this->viewModelGenerator = $viewModelGenerator;
    }

    public function setViewModelGeneratorRequestBuilder(
        ViewModelGeneratorRequestBuilder $viewModelGeneratorRequestBuilder
    ): void {
        $this->viewModelGeneratorRequestBuilder = $viewModelGeneratorRequestBuilder;
    }

    public function setViewModelListItemAssemblerGenerator($viewModelListItemAssemblerGenerator): void
    {
        $this->viewModelListItemAssemblerGenerator = $viewModelListItemAssemblerGenerator;
    }

    public function setViewModelListItemAssemblerGeneratorRequestBuilder(
        $viewModelListItemAssemblerGeneratorRequestBuilder
    ): void {
        $this->viewModelListItemAssemblerGeneratorRequestBuilder = $viewModelListItemAssemblerGeneratorRequestBuilder;
    }

    public function setViewModelListItemAssemblerTestGenerator(
        Generator $viewModelListItemAssemblerTestGenerator
    ): void {
        $this->viewModelListItemAssemblerTestGenerator = $viewModelListItemAssemblerTestGenerator;
    }

    public function setViewModelListItemAssemblerTestGeneratorRequestBuilder(
        ViewModelListItemAssemblerImplTestGeneratorRequestBuilder $viewModelListItemAssemblerTestGeneratorRequestBuilder
    ): void {
        $this->viewModelListItemAssemblerTestGeneratorRequestBuilder = $viewModelListItemAssemblerTestGeneratorRequestBuilder;
    }

    public function setViewModelListItemGenerator(Generator $viewModelListItemGenerator): void
    {
        $this->viewModelListItemGenerator = $viewModelListItemGenerator;
    }

    public function setViewModelListItemGeneratorRequestBuilder(
        ViewModelListItemGeneratorRequestBuilder $viewModelListItemGeneratorRequestBuilder
    ): void {
        $this->viewModelListItemGeneratorRequestBuilder = $viewModelListItemGeneratorRequestBuilder;
    }

    public function setViewModelListItemStubGenerator(
        Generator $viewModelListItemStubGenerator
    ): void {
        $this->viewModelListItemStubGenerator = $viewModelListItemStubGenerator;
    }

    public function setViewModelListItemStubGeneratorRequestBuilder(
        ViewModelListItemStubGeneratorRequestBuilder $viewModelListItemStubGeneratorRequestBuilder
    ): void {
        $this->viewModelListItemStubGeneratorRequestBuilder = $viewModelListItemStubGeneratorRequestBuilder;
    }

    public function setViewModelListItemTestCaseGenerator(
        Generator $viewModelListItemTestCaseGenerator
    ): void {
        $this->viewModelListItemTestCaseGenerator = $viewModelListItemTestCaseGenerator;
    }

    protected function generateEntityImplGenerator(string $className): FileObject
    {
        return $this->entityImplGenerator->generate(
            $this->entityImplGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateEntityStubGenerator(string $className): FileObject
    {
        return $this->entityStubGenerator->generate(
            $this->entityStubGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateUseCaseDetailResponseStubGenerator(string $className): FileObject
    {
        return $this->useCaseDetailResponseStubGenerator->generate(
            $this->useCaseDetailResponseStubGeneratorRequestBuilder
                ->create()
                ->withResponseClassName($className)
                ->build()
        );
    }

    protected function generateUseCaseListItemResponseStubGenerator(string $className): FileObject
    {
        return $this->useCaseListItemResponseStubGenerator->generate(
            $this->useCaseListItemResponseStubGeneratorRequestBuilder
                ->create()
                ->withClassName($className)
                ->withFields([])
                ->build()
        );
    }

    protected function generateViewModel(string $className): FileObject
    {
        return $this->viewModelGenerator->generate(
            $this->viewModelGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelDetailGenerator(string $className): FileObject
    {
        return $this->viewModelDetailGenerator->generate(
            $this->viewModelDetailGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelDetailAssemblerGenerator(string $className): FileObject
    {
        return $this->viewModelDetailAssemblerGenerator->generate(
            $this->viewModelDetailAssemblerGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelDetailAssemblerTestGenerator(string $className): FileObject
    {
        return $this->viewModelDetailAssemblerTestGenerator->generate(
            $this->viewModelDetailAssemblerTestGeneratorRequestBuilder
                ->create()
                ->withResponseClassName($className)
                ->build()
        );
    }

    protected function generateViewModelDetailStubGenerator(string $className): FileObject
    {
        return $this->viewModelDetailStubGenerator->generate(
            $this->viewModelDetailStubGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelListItemGenerator(string $className): FileObject
    {
        return $this->viewModelListItemGenerator->generate(
            $this->viewModelListItemGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelListItemAssemblerGenerator(string $className): FileObject
    {
        return $this->viewModelListItemAssemblerGenerator->generate(
            $this->viewModelListItemAssemblerGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelListItemAssemblerTestGenerator(string $className): FileObject
    {
        return $this->viewModelListItemAssemblerTestGenerator->generate(
            $this->viewModelListItemAssemblerTestGeneratorRequestBuilder
                ->create()
                ->withResponseClassName($className)
                ->build()
        );
    }

    protected function generateViewModelListItemStubGenerator(string $className): FileObject
    {
        return $this->viewModelListItemStubGenerator->generate(
            $this->viewModelListItemStubGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }
}
