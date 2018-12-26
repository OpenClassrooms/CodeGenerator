<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelListItemImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemImplGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\Impl\ViewModelListItemImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelListItemImpl\ViewModelListItemImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItem;
use OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels\AbstractViewModelGeneratorTestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemImplGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelListItemImplGenerator
     */
    private $viewModelListItemImplGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelListItemImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelListItemImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $viewModelListItemImplGeneratorRequestBuilder = new ViewModelListItemImplGeneratorRequestBuilderImpl();
        $this->request = $viewModelListItemImplGeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityListItem::class)
            ->build();

        $this->viewModelListItemImplGenerator = new ViewModelListItemImplGenerator();
        $this->buildViewModelGenerator($this->viewModelListItemImplGenerator);
        $this->viewModelListItemImplGenerator->setViewModelListItemImplSkeletonModelAssembler(
            new ViewModelListItemImplSkeletonModelAssemblerImpl()
        );
    }
}
