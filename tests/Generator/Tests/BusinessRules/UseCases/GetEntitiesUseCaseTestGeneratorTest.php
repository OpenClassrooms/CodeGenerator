<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\GetEntitiesUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntitiesUseCaseTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryStubGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class GetEntitiesUseCaseTestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntitiesUseCaseTestGenerator
     */
    private $getEntitiesUseCaseTestGenerator;

    /**
     * @var GetEntitiesUseCaseTestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->getEntitiesUseCaseTestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntitiesUseCaseTestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $getEntitiesUseCaseTestGeneratorRequestBuilderImpl = new GetEntitiesUseCaseTestGeneratorRequestBuilderImpl();
        $this->request = $getEntitiesUseCaseTestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->getEntitiesUseCaseTestGenerator = new GetEntitiesUseCaseTestGenerator();

        $this->getEntitiesUseCaseTestGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntitiesUseCaseTestGenerator->setGetEntitiesUseCaseTestSkeletonModelBuilder(
            new GetEntitiesUseCaseTestSkeletonModelAssemblerMock()
        );
        $this->getEntitiesUseCaseTestGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntitiesUseCaseTestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->getEntitiesUseCaseTestGenerator->setStubGateway(new InMemoryStubGateway());
        $this->getEntitiesUseCaseTestGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->getEntitiesUseCaseTestGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->getEntitiesUseCaseTestGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
    }
}
