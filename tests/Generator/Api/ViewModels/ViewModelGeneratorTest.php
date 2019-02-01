<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModel\ViewModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels\AbstractViewModelGeneratorTestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelGenerator
     */
    private $viewModelGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $viewModelGeneratorRequestBuilder = new ViewModelGeneratorRequestBuilderImpl();
        $this->request = $viewModelGeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponseDTO::class)
            ->build();

        $this->viewModelGenerator = new ViewModelGenerator();
        $this->buildViewModelGenerator($this->viewModelGenerator);

        $this->viewModelGenerator->setViewModelSkeletonModelAssembler(new ViewModelSkeletonModelAssemblerImpl());
    }
}
