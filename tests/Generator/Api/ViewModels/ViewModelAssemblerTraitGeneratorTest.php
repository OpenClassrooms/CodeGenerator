<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModelAssemblerTraits;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelAssemblerTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelAssemblerTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelAssemblerTraitSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelAssemblerTrait\ViewModelAssemblerTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels\AbstractViewModelGeneratorTestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelAssemblerTraitGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelAssemblerTraitGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelAssemblerTraitGenerator
     */
    private $viewModelAssemblerTraitGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelAssemblerTraitGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelAssemblerTraitFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $viewModelAssemblerTraitGeneratorRequestBuilder = new ViewModelAssemblerTraitGeneratorRequestBuilderImpl();
        $this->request = $viewModelAssemblerTraitGeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponseDTO::class)
            ->build();

        $this->viewModelAssemblerTraitGenerator = new ViewModelAssemblerTraitGenerator();
        $this->buildViewModelGenerator($this->viewModelAssemblerTraitGenerator);

        $this->viewModelAssemblerTraitGenerator->setViewModelAssemblerTraitSkeletonModelAssembler(new ViewModelAssemblerTraitSkeletonModelAssemblerImpl());
    }
}
