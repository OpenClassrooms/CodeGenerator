<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelDetailImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailImplGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelDetailImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailImpl\ViewModelDetailImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels\AbstractViewModelGeneratorTestCase;

class ViewModelDetailImplGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelDetailImplGenerator
     */
    private $viewModelDetailImplGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->viewModelDetailImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $viewModelDetailImplGeneratorRequestBuilder = new ViewModelDetailImplGeneratorRequestBuilderImpl();
        $this->request = $viewModelDetailImplGeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->viewModelDetailImplGenerator = new ViewModelDetailImplGenerator();
        $this->buildViewModelGenerator($this->viewModelDetailImplGenerator);
        $this->viewModelDetailImplGenerator->setViewModelDetailImplSkeletonModelAssembler(
            new ViewModelDetailImplSkeletonModelAssemblerImpl()
        );
    }
}
