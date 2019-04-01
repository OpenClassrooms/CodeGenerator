<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Impl\UseCaseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GenericUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GenericUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl\GenericUseCaseRequestSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\Requestors\GenericUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseRequestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseRequestGenerator
     */
    private $genericUseCaseRequestGenerator;

    /**
     * @var GenericUseCaseRequestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseRequestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseRequestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseRequestGeneratorRequestBuilderImpl = new GenericUseCaseRequestGeneratorRequestBuilderImpl();
        $this->request = $genericUseCaseRequestGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('Domain\SubDomain')
            ->withUseCaseName('GenericUseCase')
            ->build();

        $this->genericUseCaseRequestGenerator = new GenericUseCaseRequestGenerator();

        $useCaseFileObjectFactory = new UseCaseFileObjectFactoryImpl();
        $useCaseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $this->genericUseCaseRequestGenerator->setUseCaseFileObjectFactory($useCaseFileObjectFactory);

        $genericUseCaseRequestSkeletonModelAssemblerImpl = new GenericUseCaseRequestSkeletonModelAssemblerImpl();
        $genericUseCaseRequestSkeletonModelAssemblerImpl->setUseCaseClassName(FixturesConfig::USE_CASE_NAMESPACE);
        $genericUseCaseRequestSkeletonModelAssemblerImpl->setUseCaseRequestClassName(
            FixturesConfig::USE_CASE_REQUEST_NAMESPACE
        );
        $this->genericUseCaseRequestGenerator->setGenericUseCaseRequestSkeletonModelAssembler(
            $genericUseCaseRequestSkeletonModelAssemblerImpl
        );

        $this->genericUseCaseRequestGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseRequestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
