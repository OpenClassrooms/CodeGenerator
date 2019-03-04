<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GenericUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GenericUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl\GenericUseCaseRequestBuilderSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\Requestors\GenericUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseRequestBuilderGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseRequestBuilderGenerator
     */
    private $genericUseCaseRequestBuilderGenerator;

    /**
     * @var GenericUseCaseRequestBuilderGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseRequestBuilderGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseRequestBuilderFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseRequestBuilderGeneratorRequestBuilderImpl = new GenericUseCaseRequestBuilderGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseRequestBuilderGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('Domain\SubDomain')
            ->withUseCaseName('GenericUseCase')
            ->build();

        $this->genericUseCaseRequestBuilderGenerator = new GenericUseCaseRequestBuilderGenerator();

        $useCaseFileObjectFactory = new UseCaseFileObjectFactoryImpl();
        $useCaseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $this->genericUseCaseRequestBuilderGenerator->setUseCaseFileObjectFactory($useCaseFileObjectFactory);

        $genericUseCaseRequestBuilderSkeletonModelAssemblerImpl = new GenericUseCaseRequestBuilderSkeletonModelAssemblerImpl(
        );
        $genericUseCaseRequestBuilderSkeletonModelAssemblerImpl->setUseCaseClassName(
            FixturesConfig::USE_CASE_NAMESPACE
        );
        $genericUseCaseRequestBuilderSkeletonModelAssemblerImpl->setUseCaseRequestClassName(
            FixturesConfig::USE_CASE_REQUEST_NAMESPACE
        );
        $this->genericUseCaseRequestBuilderGenerator->setGenericUseCaseRequestBuilderSkeletonModelAssembler(
            $genericUseCaseRequestBuilderSkeletonModelAssemblerImpl
        );

        $this->genericUseCaseRequestBuilderGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseRequestBuilderGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
