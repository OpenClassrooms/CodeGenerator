<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelListItemAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemAssemblerGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelListItemAssemblerSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelListItemAssembler\ViewModelListItemAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemAssemblerGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelListItemAssemblerGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelListItemAssemblerGenerator
     */
    private $viewModelListItemAssemblerGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelListItemAssemblerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelListItemAssemblerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $this->viewModelListItemAssemblerGenerator = new ViewModelListItemAssemblerGenerator();
        $viewModelListItemAssemblerRequestBuilder = new ViewModelListItemAssemblerGeneratorRequestBuilderImpl();
        $this->request = $viewModelListItemAssemblerRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponseDTO::class)
            ->build();

        $this->buildViewModelGenerator($this->viewModelListItemAssemblerGenerator);
        $this->viewModelListItemAssemblerGenerator->setViewModelListItemAssemblerSkeletonModelAssembler(
            new ViewModelListItemAssemblerSkeletonModelAssemblerImpl()
        );
    }
}
