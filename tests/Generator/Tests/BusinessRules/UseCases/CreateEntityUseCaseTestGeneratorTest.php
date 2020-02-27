<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\CreateEntityUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\CreateEntityUseCaseTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestSkeletonModelBuilderMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class CreateEntityUseCaseTestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var CreateEntityUseCaseTestGenerator
     */
    private $createEntityTestGenerator;

    /**
     * @var CreateEntityUseCaseTestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->createEntityTestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new CreateEntityUseCaseTestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $createEntityTestGeneratorRequestBuilderImpl = new CreateEntityUseCaseTestGeneratorRequestBuilderImpl();
        $this->request = $createEntityTestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->createEntityTestGenerator = new CreateEntityUseCaseTestGenerator();

        $this->createEntityTestGenerator->setCreateEntityUseCaseTestSkeletonModelBuilder(
            new CreateEntityUseCaseTestSkeletonModelBuilderMock()
        );
        $this->createEntityTestGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->createEntityTestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->createEntityTestGenerator->setTemplating(new TemplatingServiceMock());
        $this->createEntityTestGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->createEntityTestGenerator->setUseCaseRequestFileObjectFactory(new UseCaseRequestFileObjectFactoryMock());
        $this->createEntityTestGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
    }
}
