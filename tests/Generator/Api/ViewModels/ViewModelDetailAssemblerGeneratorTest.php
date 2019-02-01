<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelDetailAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailAssemblerGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelDetailAssemblerSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailAssembler\ViewModelDetailAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelDetailAssemblerGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelDetailAssemblerGenerator
     */
    private $viewModelDetailAssemblerGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelDetailAssemblerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailAssemblerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $this->viewModelDetailAssemblerGenerator = new ViewModelDetailAssemblerGenerator();
        $viewModelDetailAssemblerRequestBuilder = new ViewModelDetailAssemblerGeneratorRequestBuilderImpl();
        $this->request = $viewModelDetailAssemblerRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponseDTO::class)
            ->build();

        $this->buildViewModelGenerator($this->viewModelDetailAssemblerGenerator);
        $this->viewModelDetailAssemblerGenerator->setViewModelDetailAssemblerSkeletonModelAssembler(
            new ViewModelDetailAssemblerSkeletonModelAssemblerImpl()
        );
    }
}
