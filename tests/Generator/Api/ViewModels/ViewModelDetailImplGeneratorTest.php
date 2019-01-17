<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelDetailImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailImplGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\Impl\ViewModelDetailImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailImpl\ViewModelDetailImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetail;
use OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels\AbstractViewModelGeneratorTestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
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
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelDetailImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $viewModelDetailImplGeneratorRequestBuilder = new ViewModelDetailImplGeneratorRequestBuilderImpl();
        $this->request = $viewModelDetailImplGeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityDetail::class)
            ->build();

        $this->viewModelDetailImplGenerator = new ViewModelDetailImplGenerator();
        $this->buildViewModelGenerator($this->viewModelDetailImplGenerator);
        $this->viewModelDetailImplGenerator->setViewModelDetailImplSkeletonModelAssembler(
            new ViewModelDetailImplSkeletonModelAssemblerImpl()
        );
    }
}