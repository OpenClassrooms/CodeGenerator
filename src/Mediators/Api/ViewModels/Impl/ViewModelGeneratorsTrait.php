<?php declare(strict_types=1);

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
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTestGenerator;
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

    /** @var ViewModelAssemblerTraitGenerator */
    private $viewModelAssemblerTraitGenerator;

    /** @var ViewModelAssemblerTraitGeneratorRequestBuilder */
    private $viewModelAssemblerTraitGeneratorRequestBuilder;

    /** @var ViewModelDetailAssemblerGenerator */
    private $viewModelDetailAssemblerGenerator;

    /** @var ViewModelDetailAssemblerGeneratorRequestBuilder */
    private $viewModelDetailAssemblerGeneratorRequestBuilder;

    /** @var ViewModelDetailAssemblerImplGenerator */
    private $viewModelDetailAssemblerImplGenerator;

    /** @var ViewModelDetailAssemblerImplGeneratorRequestBuilder */
    private $viewModelDetailAssemblerImplGeneratorRequestBuilder;

    /** @var ViewModelDetailAssemblerImplTestGenerator */
    private $viewModelDetailAssemblerImplTestGenerator;

    /** @var ViewModelDetailAssemblerImplTestGeneratorRequestBuilder */
    private $viewModelDetailAssemblerImplTestGeneratorRequestBuilder;

    /** @var ViewModelDetailGenerator */
    private $viewModelDetailGenerator;

    /** @var ViewModelDetailGeneratorRequestBuilder */
    private $viewModelDetailGeneratorRequestBuilder;

    /** @var ViewModelDetailImplGenerator */
    private $viewModelDetailImplGenerator;

    /** @var ViewModelDetailImplGeneratorRequestBuilder */
    private $viewModelDetailImplGeneratorRequestBuilder;

    /** @var ViewModelDetailStubGenerator */
    private $viewModelDetailStubGenerator;

    /** @var ViewModelDetailStubGeneratorRequestBuilder */
    private $viewModelDetailStubGeneratorRequestBuilder;

    /** @var ViewModelDetailTestCaseGenerator */
    private $viewModelDetailTestCaseGenerator;

    /** @var ViewModelDetailTestCaseGeneratorRequestBuilder */
    private $viewModelDetailTestCaseGeneratorRequestBuilder;

    /** @var ViewModelGenerator */
    private $viewModelGenerator;

    /** @var ViewModelGeneratorRequestBuilder */
    private $viewModelGeneratorRequestBuilder;

    /** @var ViewModelListItemAssemblerGenerator */
    private $viewModelListItemAssemblerGenerator;

    /** @var ViewModelListItemAssemblerGeneratorRequestBuilder */
    private $viewModelListItemAssemblerGeneratorRequestBuilder;

    /** @var ViewModelListItemAssemblerImplGenerator */
    private $viewModelListItemAssemblerImplGenerator;

    /** @var ViewModelListItemAssemblerImplGeneratorRequestBuilder */
    private $viewModelListItemAssemblerImplGeneratorRequestBuilder;

    /** @var ViewModelListItemAssemblerImplTestGenerator */
    private $viewModelListItemAssemblerImplTestGenerator;

    /** @var ViewModelListItemAssemblerImplTestGeneratorRequestBuilder */
    private $viewModelListItemAssemblerImplTestGeneratorRequestBuilder;

    /** @var ViewModelListItemGenerator */
    private $viewModelListItemGenerator;

    /** @var ViewModelListItemGeneratorRequestBuilder */
    private $viewModelListItemGeneratorRequestBuilder;

    /** @var ViewModelListItemImplGenerator */
    private $viewModelListItemImplGenerator;

    /** @var ViewModelListItemImplGeneratorRequestBuilder */
    private $viewModelListItemImplGeneratorRequestBuilder;

    /** @var ViewModelListItemStubGenerator */
    private $viewModelListItemStubGenerator;

    /** @var ViewModelListItemStubGeneratorRequestBuilder */
    private $viewModelListItemStubGeneratorRequestBuilder;

    /** @var ViewModelListItemTestCaseGenerator */
    private $viewModelListItemTestCaseGenerator;

    /** @var ViewModelListItemTestCaseGeneratorRequestBuilder */
    private $viewModelListItemTestCaseGeneratorRequestBuilder;

    /** @var ViewModelTestCaseGenerator */
    private $viewModelTestCaseGenerator;

    /** @var ViewModelTestCaseGeneratorRequestBuilder */
    private $viewModelTestCaseGeneratorRequestBuilder;

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

    public function setViewModelAssemblerTraitGenerator($viewModelAssemblerTraitGenerator): void
    {
        $this->viewModelAssemblerTraitGenerator = $viewModelAssemblerTraitGenerator;
    }

    public function setViewModelAssemblerTraitGeneratorRequestBuilder(
        $viewModelAssemblerTraitGeneratorRequestBuilder
    ): void {
        $this->viewModelAssemblerTraitGeneratorRequestBuilder = $viewModelAssemblerTraitGeneratorRequestBuilder;
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

    public function setViewModelDetailAssemblerImplGenerator($viewModelDetailAssemblerImplGenerator): void
    {
        $this->viewModelDetailAssemblerImplGenerator = $viewModelDetailAssemblerImplGenerator;
    }

    public function setViewModelDetailAssemblerImplGeneratorRequestBuilder(
        $viewModelDetailAssemblerImplGeneratorRequestBuilder
    ): void {
        $this->viewModelDetailAssemblerImplGeneratorRequestBuilder = $viewModelDetailAssemblerImplGeneratorRequestBuilder;
    }

    public function setViewModelDetailAssemblerImplTestGenerator(
        Generator $viewModelDetailAssemblerImplTestGenerator
    ): void {
        $this->viewModelDetailAssemblerImplTestGenerator = $viewModelDetailAssemblerImplTestGenerator;
    }

    public function setViewModelDetailAssemblerImplTestGeneratorRequestBuilder(
        ViewModelDetailAssemblerImplTestGeneratorRequestBuilder $viewModelDetailAssemblerImplTestGeneratorRequestBuilder
    ): void {
        $this->viewModelDetailAssemblerImplTestGeneratorRequestBuilder = $viewModelDetailAssemblerImplTestGeneratorRequestBuilder;
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

    public function setViewModelDetailImplGenerator(Generator $viewModelDetailImplGenerator): void
    {
        $this->viewModelDetailImplGenerator = $viewModelDetailImplGenerator;
    }

    public function setViewModelDetailImplGeneratorRequestBuilder(
        ViewModelDetailImplGeneratorRequestBuilder $viewModelDetailImplGeneratorRequestBuilder
    ): void {
        $this->viewModelDetailImplGeneratorRequestBuilder = $viewModelDetailImplGeneratorRequestBuilder;
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

    public function setViewModelDetailTestCaseGenerator(
        Generator $viewModelDetailTestCaseGenerator
    ): void {
        $this->viewModelDetailTestCaseGenerator = $viewModelDetailTestCaseGenerator;
    }

    public function setViewModelDetailTestCaseGeneratorRequestBuilder(
        ViewModelDetailTestCaseGeneratorRequestBuilder $viewModelDetailTestCaseGeneratorRequestBuilder
    ): void {
        $this->viewModelDetailTestCaseGeneratorRequestBuilder = $viewModelDetailTestCaseGeneratorRequestBuilder;
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

    public function setViewModelListItemAssemblerImplGenerator($viewModelListItemAssemblerImplGenerator): void
    {
        $this->viewModelListItemAssemblerImplGenerator = $viewModelListItemAssemblerImplGenerator;
    }

    public function setViewModelListItemAssemblerImplGeneratorRequestBuilder(
        $viewModelListItemAssemblerImplGeneratorRequestBuilder
    ): void {
        $this->viewModelListItemAssemblerImplGeneratorRequestBuilder = $viewModelListItemAssemblerImplGeneratorRequestBuilder;
    }

    public function setViewModelListItemAssemblerImplTestGenerator(
        Generator $viewModelListItemAssemblerImplTestGenerator
    ): void {
        $this->viewModelListItemAssemblerImplTestGenerator = $viewModelListItemAssemblerImplTestGenerator;
    }

    public function setViewModelListItemAssemblerImplTestGeneratorRequestBuilder(
        ViewModelListItemAssemblerImplTestGeneratorRequestBuilder $viewModelListItemAssemblerImplTestGeneratorRequestBuilder
    ): void {
        $this->viewModelListItemAssemblerImplTestGeneratorRequestBuilder = $viewModelListItemAssemblerImplTestGeneratorRequestBuilder;
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

    public function setViewModelListItemImplGenerator(
        Generator $viewModelListItemImplGenerator
    ): void {
        $this->viewModelListItemImplGenerator = $viewModelListItemImplGenerator;
    }

    public function setViewModelListItemImplGeneratorRequestBuilder(
        ViewModelListItemImplGeneratorRequestBuilder $viewModelListItemImplGeneratorRequestBuilder
    ): void {
        $this->viewModelListItemImplGeneratorRequestBuilder = $viewModelListItemImplGeneratorRequestBuilder;
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

    public function setViewModelListItemTestCaseGeneratorRequestBuilder(
        ViewModelListItemTestCaseGeneratorRequestBuilder $viewModelListItemTestCaseGeneratorRequestBuilder
    ): void {
        $this->viewModelListItemTestCaseGeneratorRequestBuilder = $viewModelListItemTestCaseGeneratorRequestBuilder;
    }

    public function setViewModelTestCaseGenerator(Generator $viewModelTestCaseGenerator): void
    {
        $this->viewModelTestCaseGenerator = $viewModelTestCaseGenerator;
    }

    public function setViewModelTestCaseGeneratorRequestBuilder(
        ViewModelTestCaseGeneratorRequestBuilder $viewModelTestCaseGeneratorRequestBuilder
    ): void {
        $this->viewModelTestCaseGeneratorRequestBuilder = $viewModelTestCaseGeneratorRequestBuilder;
    }

    protected function generateEntityImplGenerator(string $className): FileObject
    {
        return $this->entityImplGenerator->generate(
            $this->entityImplGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateEntityStub(string $className): FileObject
    {
        return $this->entityStubGenerator->generate(
            $this->entityStubGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateUseCaseDetailResponseStub(string $className): FileObject
    {
        return $this->useCaseDetailResponseStubGenerator->generate(
            $this->useCaseDetailResponseStubGeneratorRequestBuilder
                ->create()
                ->withResponseClassName($className)
                ->build()
        );
    }

    protected function generateUseCaseListItemResponseStub(string $className): FileObject
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

    protected function generateViewModelAssemblerTraitGenerator(string $className): FileObject
    {
        return $this->viewModelAssemblerTraitGenerator->generate(
            $this->viewModelAssemblerTraitGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelDetail(string $className): FileObject
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

    protected function generateViewModelDetailAssemblerImplGenerator(string $className): FileObject
    {
        return $this->viewModelDetailAssemblerImplGenerator->generate(
            $this->viewModelDetailAssemblerImplGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelDetailAssemblerImplTest(string $className): FileObject
    {
        return $this->viewModelDetailAssemblerImplTestGenerator->generate(
            $this->viewModelDetailAssemblerImplTestGeneratorRequestBuilder
                ->create()
                ->withResponseClassName($className)
                ->build()
        );
    }

    protected function generateViewModelDetailImpl(string $className): FileObject
    {
        return $this->viewModelDetailImplGenerator->generate(
            $this->viewModelDetailImplGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelDetailStub(string $className): FileObject
    {
        return $this->viewModelDetailStubGenerator->generate(
            $this->viewModelDetailStubGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelDetailTestCase(string $className): FileObject
    {
        return $this->viewModelDetailTestCaseGenerator->generate(
            $this->viewModelDetailTestCaseGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelListItem(string $className): FileObject
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

    protected function generateViewModelListItemAssemblerImplGenerator(string $className): FileObject
    {
        return $this->viewModelListItemAssemblerImplGenerator->generate(
            $this->viewModelListItemAssemblerImplGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelListItemAssemblerImplTest(string $className): FileObject
    {
        return $this->viewModelListItemAssemblerImplTestGenerator->generate(
            $this->viewModelListItemAssemblerImplTestGeneratorRequestBuilder
                ->create()
                ->withResponseClassName($className)
                ->build()
        );
    }

    protected function generateViewModelListItemImpl(string $className): FileObject
    {
        return $this->viewModelListItemImplGenerator->generate(
            $this->viewModelListItemImplGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelListItemStub(string $className): FileObject
    {
        return $this->viewModelListItemStubGenerator->generate(
            $this->viewModelListItemStubGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelListItemTestCase(string $className): FileObject
    {
        return $this->viewModelListItemTestCaseGenerator->generate(
            $this->viewModelListItemTestCaseGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }

    protected function generateViewModelTestCase(string $className): FileObject
    {
        return $this->viewModelTestCaseGenerator->generate(
            $this->viewModelTestCaseGeneratorRequestBuilder->create()->withClassName($className)->build()
        );
    }
}
