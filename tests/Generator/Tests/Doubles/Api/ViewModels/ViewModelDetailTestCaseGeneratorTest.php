<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request\ViewModelDetailTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl\ViewModelDetailTestCaseSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailTestCase\ViewModelDetailTestCaseFileObjectStub1;
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
class ViewModelDetailTestCaseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelDetailTestCaseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelDetailTestCaseGenerator
     */
    private $viewModelDetailTestCaseGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelDetailTestCaseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailTestCaseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $stub1GeneratorRequestBuilder = new ViewModelDetailTestCaseGeneratorRequestBuilderImpl();
        $this->request = $stub1GeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->viewModelDetailTestCaseGenerator = new ViewModelDetailTestCaseGenerator();

        $this->viewModelDetailTestCaseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelDetailTestCaseGenerator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->viewModelDetailTestCaseGenerator->setTemplating(new TemplatingServiceMock());
        $this->viewModelDetailTestCaseGenerator->setViewModelFileObjectFactory(new ViewModelFileObjectFactoryMock());
        $this->viewModelDetailTestCaseGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->viewModelDetailTestCaseGenerator->setViewModelDetailTestCaseSkeletonModelAssembler(
            new ViewModelDetailTestCaseSkeletonModelAssemblerImpl()
        );
    }
}
