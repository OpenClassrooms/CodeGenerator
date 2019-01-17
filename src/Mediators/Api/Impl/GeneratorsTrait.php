<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\EntityStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseDetailResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseListItemResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelDetailStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelListItemStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseGenerator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait GeneratorsTrait
{
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

    public function setEntityStubGeneratorRequestBuilder(
        EntityStubGeneratorRequestBuilder $entityStubGeneratorRequestBuilder
    ): void
    {
        $this->entityStubGeneratorRequestBuilder = $entityStubGeneratorRequestBuilder;
    }

    public function setUseCaseDetailResponseStubGeneratorRequestBuilder(
        UseCaseDetailResponseStubGeneratorRequestBuilder $useCaseDetailResponseStubGeneratorRequestBuilder
    ): void
    {
        $this->useCaseDetailResponseStubGeneratorRequestBuilder = $useCaseDetailResponseStubGeneratorRequestBuilder;
    }

    public function setUseCaseListItemResponseStubGeneratorRequestBuilder(
        UseCaseListItemResponseStubGeneratorRequestBuilder $useCaseListItemResponseStubGeneratorRequestBuilder
    ): void
    {
        $this->useCaseListItemResponseStubGeneratorRequestBuilder = $useCaseListItemResponseStubGeneratorRequestBuilder;
    }

    public function setViewModelDetailAssemblerImplTestGeneratorRequestBuilder(
        ViewModelDetailAssemblerImplTestGeneratorRequestBuilder $viewModelDetailAssemblerImplTestGeneratorRequestBuilder
    ): void
    {
        $this->viewModelDetailAssemblerImplTestGeneratorRequestBuilder = $viewModelDetailAssemblerImplTestGeneratorRequestBuilder;
    }

    public function setViewModelDetailGeneratorRequestBuilder(
        ViewModelDetailGeneratorRequestBuilder $viewModelDetailGeneratorRequestBuilder
    ): void
    {
        $this->viewModelDetailGeneratorRequestBuilder = $viewModelDetailGeneratorRequestBuilder;
    }

    public function setViewModelDetailImplGeneratorRequestBuilder(
        ViewModelDetailImplGeneratorRequestBuilder $viewModelDetailImplGeneratorRequestBuilder
    ): void
    {
        $this->viewModelDetailImplGeneratorRequestBuilder = $viewModelDetailImplGeneratorRequestBuilder;
    }

    public function setViewModelDetailStubGeneratorRequestBuilder(
        ViewModelDetailStubGeneratorRequestBuilder $viewModelDetailStubGeneratorRequestBuilder
    ): void
    {
        $this->viewModelDetailStubGeneratorRequestBuilder = $viewModelDetailStubGeneratorRequestBuilder;
    }

    public function setViewModelDetailTestCaseGeneratorRequestBuilder(
        ViewModelDetailTestCaseGeneratorRequestBuilder $viewModelDetailTestCaseGeneratorRequestBuilder
    ): void
    {
        $this->viewModelDetailTestCaseGeneratorRequestBuilder = $viewModelDetailTestCaseGeneratorRequestBuilder;
    }

    public function setViewModelGeneratorRequestBuilder(
        ViewModelGeneratorRequestBuilder $viewModelGeneratorRequestBuilder
    ): void
    {
        $this->viewModelGeneratorRequestBuilder = $viewModelGeneratorRequestBuilder;
    }

    public function setViewModelListItemAssemblerImplTestGeneratorRequestBuilder(
        ViewModelListItemAssemblerImplTestGeneratorRequestBuilder $viewModelListItemAssemblerImplTestGeneratorRequestBuilder
    ): void
    {
        $this->viewModelListItemAssemblerImplTestGeneratorRequestBuilder = $viewModelListItemAssemblerImplTestGeneratorRequestBuilder;
    }

    public function setViewModelListItemGeneratorRequestBuilder(
        ViewModelListItemGeneratorRequestBuilder $viewModelListItemGeneratorRequestBuilder
    ): void
    {
        $this->viewModelListItemGeneratorRequestBuilder = $viewModelListItemGeneratorRequestBuilder;
    }

    public function setViewModelListItemImplGeneratorRequestBuilder(
        ViewModelListItemImplGeneratorRequestBuilder $viewModelListItemImplGeneratorRequestBuilder
    ): void
    {
        $this->viewModelListItemImplGeneratorRequestBuilder = $viewModelListItemImplGeneratorRequestBuilder;
    }

    public function setViewModelListItemStubGeneratorRequestBuilder(
        ViewModelListItemStubGeneratorRequestBuilder $viewModelListItemStubGeneratorRequestBuilder
    ): void
    {
        $this->viewModelListItemStubGeneratorRequestBuilder = $viewModelListItemStubGeneratorRequestBuilder;
    }

    public function setViewModelListItemTestCaseGeneratorRequestBuilder(
        ViewModelListItemTestCaseGeneratorRequestBuilder $viewModelListItemTestCaseGeneratorRequestBuilder
    ): void
    {
        $this->viewModelListItemTestCaseGeneratorRequestBuilder = $viewModelListItemTestCaseGeneratorRequestBuilder;
    }

    public function setEntityStubGenerator(Generator $entityStubGenerator): void
    {
        $this->entityStubGenerator = $entityStubGenerator;
    }

    public function setUseCaseDetailResponseStubGenerator(
        Generator $useCaseDetailResponseStubGenerator
    ): void
    {
        $this->useCaseDetailResponseStubGenerator = $useCaseDetailResponseStubGenerator;
    }

    public function setUseCaseListItemResponseStubGenerator(
        Generator $useCaseListItemResponseStubGenerator
    ): void
    {
        $this->useCaseListItemResponseStubGenerator = $useCaseListItemResponseStubGenerator;
    }

    public function setViewModelDetailAssemblerImplTestGenerator(
        Generator $viewModelDetailAssemblerImplTestGenerator
    ): void
    {
        $this->viewModelDetailAssemblerImplTestGenerator = $viewModelDetailAssemblerImplTestGenerator;
    }

    public function setViewModelDetailGenerator(Generator $viewModelDetailGenerator): void
    {
        $this->viewModelDetailGenerator = $viewModelDetailGenerator;
    }

    public function setViewModelDetailImplGenerator(Generator $viewModelDetailImplGenerator): void
    {
        $this->viewModelDetailImplGenerator = $viewModelDetailImplGenerator;
    }

    public function setViewModelDetailStubGenerator(Generator $viewModelDetailStubGenerator): void
    {
        $this->viewModelDetailStubGenerator = $viewModelDetailStubGenerator;
    }

    public function setViewModelDetailTestCaseGenerator(
        Generator $viewModelDetailTestCaseGenerator
    ): void
    {
        $this->viewModelDetailTestCaseGenerator = $viewModelDetailTestCaseGenerator;
    }

    public function setViewModelGenerator(Generator $viewModelGenerator): void
    {
        $this->viewModelGenerator = $viewModelGenerator;
    }

    public function setViewModelListItemAssemblerImplTestGenerator(
        Generator $viewModelListItemAssemblerImplTestGenerator
    ): void
    {
        $this->viewModelListItemAssemblerImplTestGenerator = $viewModelListItemAssemblerImplTestGenerator;
    }

    public function setViewModelListItemGenerator(Generator $viewModelListItemGenerator): void
    {
        $this->viewModelListItemGenerator = $viewModelListItemGenerator;
    }

    public function setViewModelListItemImplGenerator(
        Generator $viewModelListItemImplGenerator
    ): void
    {
        $this->viewModelListItemImplGenerator = $viewModelListItemImplGenerator;
    }

    public function setViewModelListItemStubGenerator(
        Generator $viewModelListItemStubGenerator
    ): void
    {
        $this->viewModelListItemStubGenerator = $viewModelListItemStubGenerator;
    }

    public function setViewModelListItemTestCaseGenerator(
        Generator $viewModelListItemTestCaseGenerator
    ): void
    {
        $this->viewModelListItemTestCaseGenerator = $viewModelListItemTestCaseGenerator;
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
                ->withResponseClassName($className)
                ->build()
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

    protected function generateViewModelDetail(string $className): FileObject
    {
        return $this->viewModelDetailGenerator->generate(
            $this->viewModelDetailGeneratorRequestBuilder->create()->withClassName($className)->build()
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

    protected function generateViewModel(string $className): FileObject
    {
        return $this->viewModelGenerator->generate(
            $this->viewModelGeneratorRequestBuilder->create()->withClassName($className)->build()
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

    protected function generateViewModelListItem(string $className): FileObject
    {
        return $this->viewModelListItemGenerator->generate(
            $this->viewModelListItemGeneratorRequestBuilder->create()->withClassName($className)->build()
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
}
