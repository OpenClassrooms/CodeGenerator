<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request\PostEntityControllerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\PostEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\PostEntityControllerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\PostEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ControllerFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Controller\PostEntityControllerSkeletonModelBuilderMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class PostEntityControllerGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var PostEntityControllerGenerator
     */
    private $postEntityControllerGenerator;

    /**
     * @var PostEntityControllerGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->postEntityControllerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new PostEntityControllerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $postEntityControllerGeneratorRequestBuilderImpl = new PostEntityControllerGeneratorRequestBuilderImpl();
        $this->request = $postEntityControllerGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->postEntityControllerGenerator = new PostEntityControllerGenerator();

        $this->postEntityControllerGenerator->setControllerFileObjectFactory(new ControllerFileObjectFactoryMock());
        $this->postEntityControllerGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->postEntityControllerGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->postEntityControllerGenerator->setModelFileObjectFactory(new ModelFileObjectFactoryMock());
        $this->postEntityControllerGenerator->setPostEntityControllerSkeletonModelBuilder(
            new PostEntityControllerSkeletonModelBuilderMock()
        );
        $this->postEntityControllerGenerator->setTemplating(new TemplatingServiceMock());
        $this->postEntityControllerGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->postEntityControllerGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->postEntityControllerGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->postEntityControllerGenerator->setViewModelFileObjectFactory(new ViewModelFileObjectFactoryMock());
    }
}
