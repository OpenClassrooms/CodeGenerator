<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request\ViewModelDetailStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelDetailStubGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl\ViewModelDetailStubSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailStub\ViewModelDetailStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailStubGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelDetailStubGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelDetailStubGenerator
     */
    private $viewModelDetailStubGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->viewModelDetailStubGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailStubFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $stub1GeneratorRequestBuilder = new ViewModelDetailStubGeneratorRequestBuilderImpl();
        $this->request = $stub1GeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->viewModelDetailStubGenerator = new ViewModelDetailStubGenerator();

        $this->viewModelDetailStubGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelDetailStubGenerator->setTemplating(new TemplatingServiceMock());
        $this->viewModelDetailStubGenerator->setViewModelFileObjectFactory(new ViewModelFileObjectFactoryMock());
        $this->viewModelDetailStubGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->viewModelDetailStubGenerator->setViewModelDetailStubSkeletonModelAssembler(
            new ViewModelDetailStubSkeletonModelAssemblerImpl()
        );
    }
}
