<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GenericUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GenericUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl\GenericUseCaseRequestSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GenericUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

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
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->genericUseCaseRequestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseRequestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $genericUseCaseRequestGeneratorRequestBuilderImpl = new GenericUseCaseRequestGeneratorRequestBuilderImpl();
        $this->request = $genericUseCaseRequestGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('Domain\SubDomain')
            ->withUseCaseName('GenericUseCase')
            ->build();

        $this->genericUseCaseRequestGenerator = new GenericUseCaseRequestGenerator();

        $this->genericUseCaseRequestGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );

        $genericUseCaseRequestSkeletonModelAssemblerImpl = new GenericUseCaseRequestSkeletonModelAssemblerImpl();
        $genericUseCaseRequestSkeletonModelAssemblerImpl->setUseCaseClassName(FixturesConfig::USE_CASE);
        $genericUseCaseRequestSkeletonModelAssemblerImpl->setUseCaseRequestClassName(
            FixturesConfig::USE_CASE_REQUEST
        );
        $this->genericUseCaseRequestGenerator->setGenericUseCaseRequestSkeletonModelAssembler(
            $genericUseCaseRequestSkeletonModelAssemblerImpl
        );

        $this->genericUseCaseRequestGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseRequestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
