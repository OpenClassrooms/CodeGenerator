<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GenericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

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
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->genericUseCaseRequestBuilderImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseRequestBuilderImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $genericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl = new GenericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl
            ->create()
            ->withDomain('Domain\SubDomain')
            ->withUseCaseName('GenericUseCase')
            ->build();

        $this->genericUseCaseRequestBuilderImplGenerator = new GenericUseCaseRequestBuilderImplGenerator();

        $this->genericUseCaseRequestBuilderImplGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );

        $genericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl = new GenericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl(
        );
        $genericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl->setUseCaseClassName(
            FixturesConfig::USE_CASE
        );
        $genericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl->setUseCaseRequestClassName(
            FixturesConfig::USE_CASE_REQUEST
        );
        $this->genericUseCaseRequestBuilderImplGenerator->setGenericUseCaseRequestBuilderImplSkeletonModelAssembler(
            $genericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl
        );

        $this->genericUseCaseRequestBuilderImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseRequestBuilderImplGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
