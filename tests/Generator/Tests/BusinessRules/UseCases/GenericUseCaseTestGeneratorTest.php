<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Impl\UseCaseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\GenericUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GenericUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GenericUseCaseTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl\GenericUseCaseTestSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Tests\BusinessRules\UseCases\GenericUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseTestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseTestGenerator
     */
    private $genericUseCaseTestGenerator;

    /**
     * @var GenericUseCaseTestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseTestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseTestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseTestGeneratorRequestBuilderImpl = new GenericUseCaseTestGeneratorRequestBuilderImpl();
        $this->request = $genericUseCaseTestGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('Domain\SubDomain')
            ->withUseCaseName('GenericUseCase')
            ->build();

        $this->genericUseCaseTestGenerator = new GenericUseCaseTestGenerator();

        $useCaseFileObjectFactory = new UseCaseFileObjectFactoryImpl();
        $useCaseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $useCaseFileObjectFactory->setTestsBaseNamespace(FixturesConfig::TEST_BASE_NAMESPACE);
        $this->genericUseCaseTestGenerator->setUseCaseFileObjectFactory($useCaseFileObjectFactory);

        $genericUseCaseTestSkeletonModelAssemblerImpl = new GenericUseCaseTestSkeletonModelAssemblerImpl();
        $this->genericUseCaseTestGenerator->setGenericUseCaseTestSkeletonModelAssembler(
            $genericUseCaseTestSkeletonModelAssemblerImpl
        );

        $this->genericUseCaseTestGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseTestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
