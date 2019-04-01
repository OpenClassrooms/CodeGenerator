<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Impl\UseCaseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GenericUseCaseSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\UseCases\GenericUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseGenerator
     */
    private $genericUseCaseGenerator;

    /**
     * @var GenericUseCaseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseGeneratorRequestBuilderImpl = new GenericUseCaseGeneratorRequestBuilderImpl();
        $this->request = $genericUseCaseGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('Domain\SubDomain')
            ->withUseCaseName('GenericUseCase')
            ->build();

        $this->genericUseCaseGenerator = new GenericUseCaseGenerator();

        $useCaseFileObjectFactory = new UseCaseFileObjectFactoryImpl();
        $useCaseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $this->genericUseCaseGenerator->setUseCaseFileObjectFactory($useCaseFileObjectFactory);

        $genericUseCaseSkeletonModelAssemblerImpl = new GenericUseCaseSkeletonModelAssemblerImpl();
        $genericUseCaseSkeletonModelAssemblerImpl->setUseCaseClassName(FixturesConfig::USE_CASE_NAMESPACE);
        $genericUseCaseSkeletonModelAssemblerImpl->setUseCaseRequestClassName(
            FixturesConfig::USE_CASE_REQUEST_NAMESPACE
        );
        $this->genericUseCaseGenerator->setGenericUseCaseSkeletonModelAssembler(
            $genericUseCaseSkeletonModelAssemblerImpl
        );

        $this->genericUseCaseGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
