<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GenericUseCaseRequestDTOSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\UseCases\GenericUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\GenericUseCase;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseRequestDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseRequestDTOGenerator
     */
    private $genericUseCaseRequestDTOGenerator;

    /**
     * @var GenericUseCaseRequestDTOGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseRequestDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseRequestDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseRequestDTOGeneratorRequestBuilderImpl = new GenericUseCaseRequestDTOGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseRequestDTOGeneratorRequestBuilderImpl
            ->create()
            ->withClassName(GenericUseCase::class)
            ->build();

        $this->genericUseCaseRequestDTOGenerator = new GenericUseCaseRequestDTOGenerator();

        $useCaseFileObjectFactory = new UseCaseFileObjectFactoryImpl();
        $useCaseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $this->genericUseCaseRequestDTOGenerator->setUseCaseFileObjectFactory($useCaseFileObjectFactory);

        $genericUseCaseRequestDTOSkeletonModelAssemblerImpl = new GenericUseCaseRequestDTOSkeletonModelAssemblerImpl();
        $genericUseCaseRequestDTOSkeletonModelAssemblerImpl->setUseCaseClassName(FixturesConfig::USE_CASE_NAMESPACE);
        $genericUseCaseRequestDTOSkeletonModelAssemblerImpl->setUseCaseRequestClassName(
            FixturesConfig::USE_CASE_REQUEST_NAMESPACE
        );
        $this->genericUseCaseRequestDTOGenerator->setGenericUseCaseRequestDTOSkeletonModelAssembler(
            $genericUseCaseRequestDTOSkeletonModelAssemblerImpl
        );

        $this->genericUseCaseRequestDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseRequestDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
