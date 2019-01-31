<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelListItemAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\Impl\ViewModelListItemAssemblerImplSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelListItemAssemblerImpl\ViewModelListItemAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemAssemblerImplGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelListItemAssemblerImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelListItemAssemblerImplGenerator
     */
    private $viewModelListItemAssemblerImplGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelListItemAssemblerImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelListItemAssemblerImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $this->viewModelListItemAssemblerImplGenerator = new ViewModelListItemAssemblerImplGenerator();
        $viewModelListItemAssemblerImplRequestBuilder = new ViewModelListItemAssemblerImplGeneratorRequestBuilderImpl();
        $this->request = $viewModelListItemAssemblerImplRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponseDTO::class)
            ->build();

        $this->buildViewModelGenerator($this->viewModelListItemAssemblerImplGenerator);
        $this->viewModelListItemAssemblerImplGenerator->setViewModelListItemAssemblerImplSkeletonModelBuilder(
            new ViewModelListItemAssemblerImplSkeletonModelBuilderImpl()
        );
    }
}
