<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelDetailAssemblerImplTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTestGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\Impl\ViewModelDetailAssemblerImplTestSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTest\ViewModelDetailAssemblerImplTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use PHPUnit\Framework\TestCase;

class ViewModelDetailAssemblerImplTestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelDetailAssemblerImplTestGeneratorRequest
     */
    private $request;

    /**
     * @var ViewModelDetailAssemblerImplTestGenerator
     */
    private $viewModelDetailAssemblerImplTestGenerator;

    /**
     * @test
     */
    public function generate(): void
    {
        $actualFileObject = $this->viewModelDetailAssemblerImplTestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailAssemblerImplTestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $viewModelTestGeneratorRequestBuilder = new ViewModelDetailAssemblerImplTestGeneratorRequestBuilderImpl();
        $this->request = $viewModelTestGeneratorRequestBuilder
            ->create()
            ->withResponseClassName(FunctionalEntityResponse::class)
            ->build();

        $this->viewModelDetailAssemblerImplTestGenerator = new ViewModelDetailAssemblerImplTestGenerator();
        $this->viewModelDetailAssemblerImplTestGenerator->setViewModelFileObjectFactory(
            new ViewModelFileObjectFactoryMock()
        );
        $this->viewModelDetailAssemblerImplTestGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->viewModelDetailAssemblerImplTestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelDetailAssemblerImplTestGenerator->setTemplating(new TemplatingServiceMock());
        $this->viewModelDetailAssemblerImplTestGenerator->setViewModelDetailAssemblerImplTestSkeletonModelBuilder(
            new ViewModelDetailAssemblerImplTestSkeletonModelBuilderImpl()
        );
    }
}
