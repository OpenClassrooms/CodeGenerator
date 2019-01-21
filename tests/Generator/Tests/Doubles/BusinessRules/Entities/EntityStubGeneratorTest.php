<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\EntityFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\DTO\Request\EntityStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\EntityStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities\Impl\EntityStubSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\Entities\EntityStub\EntityStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EntityStubGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EntityStubGenerator
     */
    private $entityStubGenerator;

    /**
     * @var EntityStubGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->entityStubGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityStubFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $stub1GeneratorRequestBuilder = new EntityStubGeneratorRequestBuilderImpl();
        $this->request = $stub1GeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponseDTO::class)
            ->build();

        $this->entityStubGenerator = new EntityStubGenerator();

        $this->entityStubGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->entityStubGenerator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->entityStubGenerator->setTemplating(new TemplatingServiceMock());

        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
        $viewModelFileObjectFactory->setApiDir(FixturesConfig::API_DIR);
        $viewModelFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $viewModelFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);

        $entityFileObjectFactory = new EntityFileObjectFactoryImpl();
        $entityFileObjectFactory->setAppDir(FixturesConfig::APP_DIR);
        $entityFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $entityFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);

        $this->entityStubGenerator->setEntityFileObjectFactory($entityFileObjectFactory);
        $this->entityStubGenerator->setEntityStubSkeletonModelAssembler(
            new EntityStubSkeletonModelAssemblerImpl()
        );
    }
}
