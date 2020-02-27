<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DeleteEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\DeleteEntityUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\DeleteEntityUseCaseTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\DeleteEntityUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\BusinessRules\UseCases\DeleteEntityUseCaseTestSkeletonModelBuilderMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class DeleteEntityUseCaseTestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var DeleteEntityUseCaseTestGenerator
     */
    private $deleteEntityUseCaseTestGenerator;

    /**
     * @var DeleteEntityUseCaseTestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->deleteEntityUseCaseTestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new DeleteEntityUseCaseTestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $deleteEntityUseCaseTestGeneratorRequestBuilderImpl = new DeleteEntityUseCaseTestGeneratorRequestBuilderImpl();
        $this->request = $deleteEntityUseCaseTestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->deleteEntityUseCaseTestGenerator = new DeleteEntityUseCaseTestGenerator();

        $this->deleteEntityUseCaseTestGenerator->setDeleteEntityUseCaseTestSkeletonModelBuilder(
            new DeleteEntityUseCaseTestSkeletonModelBuilderMock()
        );
        $this->deleteEntityUseCaseTestGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->deleteEntityUseCaseTestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->deleteEntityUseCaseTestGenerator->setTemplating(new TemplatingServiceMock());
        $this->deleteEntityUseCaseTestGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->deleteEntityUseCaseTestGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
