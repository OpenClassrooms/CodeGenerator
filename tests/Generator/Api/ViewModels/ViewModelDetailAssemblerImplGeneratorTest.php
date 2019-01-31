<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelDetailAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelDetailAssemblerImplSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailAssemblerImpl\ViewModelDetailAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerImplGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelDetailAssemblerImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelDetailAssemblerImplGenerator
     */
    private $viewModelDetailAssemblerImplGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelDetailAssemblerImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailAssemblerImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $this->viewModelDetailAssemblerImplGenerator = new ViewModelDetailAssemblerImplGenerator();
        $viewModelDetailAssemblerImplRequestBuilder = new ViewModelDetailAssemblerImplGeneratorRequestBuilderImpl();
        $this->request = $viewModelDetailAssemblerImplRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponseDTO::class)
            ->build();

        $this->buildViewModelGenerator($this->viewModelDetailAssemblerImplGenerator);
        $this->viewModelDetailAssemblerImplGenerator->setViewModelDetailAssemblerImplSkeletonModelBuilder(
            new ViewModelDetailAssemblerImplSkeletonModelBuilderImpl()
        );
    }
}
