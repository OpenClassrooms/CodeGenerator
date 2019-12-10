<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelListItemAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemAssemblerGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelListItemAssemblerSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemAssembler\ViewModelListItemAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

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
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->viewModelListItemAssemblerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelListItemAssemblerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $this->viewModelListItemAssemblerGenerator = new ViewModelListItemAssemblerGenerator();
        $viewModelListItemAssemblerRequestBuilder = new ViewModelListItemAssemblerGeneratorRequestBuilderImpl();
        $this->request = $viewModelListItemAssemblerRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->buildViewModelGenerator($this->viewModelListItemAssemblerGenerator);
        $this->viewModelListItemAssemblerGenerator->setViewModelListItemAssemblerSkeletonModelAssembler(
            new ViewModelListItemAssemblerSkeletonModelAssemblerImpl()
        );
    }
}
