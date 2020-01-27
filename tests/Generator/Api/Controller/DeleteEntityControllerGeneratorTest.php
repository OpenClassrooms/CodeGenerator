<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DeleteEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request\DeleteEntityControllerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\DeleteEntityControllerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\DeleteEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ControllerFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Controller\DeleteEntityControllerSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class DeleteEntityControllerGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var DeleteEntityControllerGenerator
     */
    private $deleteEntityControllerGenerator;

    /**
     * @var DeleteEntityControllerGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->deleteEntityControllerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new DeleteEntityControllerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $deleteEntityControllerGeneratorRequestBuilderImpl = new DeleteEntityControllerGeneratorRequestBuilderImpl();
        $this->request = $deleteEntityControllerGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->deleteEntityControllerGenerator = new DeleteEntityControllerGenerator();

        $this->deleteEntityControllerGenerator->setDeleteEntityControllerSkeletonModelAssembler(
            new DeleteEntityControllerSkeletonModelAssemblerMock()
        );
        $this->deleteEntityControllerGenerator->setTemplating(new TemplatingServiceMock());
        $this->deleteEntityControllerGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->deleteEntityControllerGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->deleteEntityControllerGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->deleteEntityControllerGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->deleteEntityControllerGenerator->setControllerFileObjectFactory(new ControllerFileObjectFactoryMock());
    }
}
