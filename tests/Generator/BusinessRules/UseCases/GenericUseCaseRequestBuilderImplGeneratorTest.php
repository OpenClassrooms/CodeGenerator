<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GenericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\GenericUseCase;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseRequestBuilderImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseRequestBuilderImplGenerator
     */
    private $genericUseCaseRequestBuilderImplGenerator;

    /**
     * @var GenericUseCaseRequestBuilderImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseRequestBuilderImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseRequestBuilderImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl = new GenericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl
            ->create()
            ->withClassName(GenericUseCase::class)
            ->build();

        $this->genericUseCaseRequestBuilderImplGenerator = new GenericUseCaseRequestBuilderImplGenerator();

        $useCaseFileObjectFactory = new UseCaseFileObjectFactoryImpl();
        $useCaseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $this->genericUseCaseRequestBuilderImplGenerator->setUseCaseFileObjectFactory($useCaseFileObjectFactory);

        $genericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl = new GenericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl(
        );
        $genericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl->setUseCaseClassName(
            FixturesConfig::USE_CASE_NAMESPACE
        );
        $genericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl->setUseCaseRequestClassName(
            FixturesConfig::USE_CASE_REQUEST_NAMESPACE
        );
        $this->genericUseCaseRequestBuilderImplGenerator->setGenericUseCaseRequestBuilderImplSkeletonModelAssembler(
            $genericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl
        );

        $this->genericUseCaseRequestBuilderImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseRequestBuilderImplGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
