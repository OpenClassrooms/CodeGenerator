<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModelsDetail\ViewModelDetailGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail\Impl\ViewModelDetailSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetail\ViewModelDetailFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelDetailGenerator
     */
    private $viewModelDetailGenerator;

    /**
     * @test
     */
    public function generate()
    {
        $actualFileObject = $this->viewModelDetailGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $viewModelDetailGeneratorRequestBuilder = new ViewModelGeneratorRequestBuilderImpl();
        $this->request = $viewModelDetailGeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityDetailResponseDTO::class)
            ->build();

        $this->viewModelDetailGenerator = new ViewModelDetailGenerator();
        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
        $viewModelFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $useCaseResponseFileObjectFactory = new UseCaseResponseFileObjectFactoryImpl();
        $useCaseResponseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $this->viewModelDetailGenerator->setUseCaseResponseFileObjectFactory($useCaseResponseFileObjectFactory);
        $this->viewModelDetailGenerator->setViewModelFileObjectFactory($viewModelFileObjectFactory);
        $this->viewModelDetailGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelDetailGenerator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->viewModelDetailGenerator->setTemplating(new TemplatingMock());
        $this->viewModelDetailGenerator->setViewModelDetailSkeletonModelAssembler(
            new ViewModelDetailSkeletonModelAssemblerImpl()
        );
    }
}
