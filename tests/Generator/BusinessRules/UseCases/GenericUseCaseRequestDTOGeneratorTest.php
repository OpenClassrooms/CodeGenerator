<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GenericUseCaseRequestDTOSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

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
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->genericUseCaseRequestDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseRequestDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $genericUseCaseRequestDTOGeneratorRequestBuilderImpl = new GenericUseCaseRequestDTOGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseRequestDTOGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('Domain\SubDomain')
            ->withUseCaseName('GenericUseCase')
            ->build();

        $this->genericUseCaseRequestDTOGenerator = new GenericUseCaseRequestDTOGenerator();

        $this->genericUseCaseRequestDTOGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );

        $genericUseCaseRequestDTOSkeletonModelAssemblerImpl = new GenericUseCaseRequestDTOSkeletonModelAssemblerImpl();
        $genericUseCaseRequestDTOSkeletonModelAssemblerImpl->setUseCaseClassName(FixturesConfig::USE_CASE);
        $genericUseCaseRequestDTOSkeletonModelAssemblerImpl->setUseCaseRequestClassName(
            FixturesConfig::USE_CASE_REQUEST
        );
        $this->genericUseCaseRequestDTOGenerator->setGenericUseCaseRequestDTOSkeletonModelAssembler(
            $genericUseCaseRequestDTOSkeletonModelAssemblerImpl
        );

        $this->genericUseCaseRequestDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseRequestDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
