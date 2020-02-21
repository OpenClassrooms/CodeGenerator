<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request\GetEntitiesControllerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\GetEntitiesControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntitiesControllerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\Domain\SubDomain\GetEntitiesControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ControllerFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Controller\GetEntitiesControllerSkeletonModelBuilderMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class GetEntitiesControllerGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntitiesControllerGenerator
     */
    private $getEntitiesControllerGenerator;

    /**
     * @var GetEntitiesControllerGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->getEntitiesControllerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntitiesControllerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $getEntitiesControllerGeneratorRequestBuilderImpl = new GetEntitiesControllerGeneratorRequestBuilderImpl();
        $this->request = $getEntitiesControllerGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->getEntitiesControllerGenerator = new GetEntitiesControllerGenerator();

        $this->getEntitiesControllerGenerator->setControllerFileObjectFactory(new ControllerFileObjectFactoryMock());
        $this->getEntitiesControllerGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntitiesControllerGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->getEntitiesControllerGenerator->setGetEntitiesControllerSkeletonModelBuilder(
            new GetEntitiesControllerSkeletonModelBuilderMock()
        );
        $this->getEntitiesControllerGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntitiesControllerGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->getEntitiesControllerGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->getEntitiesControllerGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->getEntitiesControllerGenerator->setViewModelFileObjectFactory(new ViewModelFileObjectFactoryMock());
    }
}
