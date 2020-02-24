<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\Api\Controller\Impl;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DeleteEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request\DeleteEntityControllerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request\GetEntitiesControllerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request\GetEntityControllerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request\PatchEntityControllerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request\PostEntityControllerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\GetEntitiesControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\GetEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\PatchEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\PostEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request\EntityModelTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request\PatchEntityModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request\PostEntityModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request\PutEntityModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\EntityModelTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\PatchEntityModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\PostEntityModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\PutEntityModelGenerator;
use OpenClassrooms\CodeGenerator\Mediators\Api\Controller\CommonControllerMediator;
use OpenClassrooms\CodeGenerator\Mediators\Api\Controller\ControllerMediator;
use OpenClassrooms\CodeGenerator\Mediators\Api\Controller\Impl\CommonControllerMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Api\Controller\Impl\ControllerMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Api\Models\Impl\ModelMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Api\Models\ModelMediator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\ClassType;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\Domain\SubDomain\DeleteEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\Domain\SubDomain\GetEntitiesControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\Domain\SubDomain\GetEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\Domain\SubDomain\PatchEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\Domain\SubDomain\PostEntityControllerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\EntityModelTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\PatchEntityModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\PostEntityModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\PutEntityModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Mediators\MediatorFileObjectTestCase;
use PHPUnit\Framework\TestCase;

final class CommonControllerMediatorImplTest extends TestCase
{
    use MediatorFileObjectTestCase;

    /** @var CommonControllerMediator */
    private $commonControllerMediator;

    /** @var ControllerMediator */
    private $controllerMediator;

    /** @var ModelMediator */
    private $modelMediator;

    /** @var array */
    private $args;

    /**
     * @test
     * @expectedException  \ErrorException
     */
    public function generateCommonControllerThrowException(): void
    {
        $this->commonControllerMediator->mediate(
            [Args::CLASS_NAME => FunctionalEntity::class, Args::TYPE => -1],
            [Options::DUMP => null]
        );
    }

    /**
     * @test
     * @dataProvider optionProvider
     */
    public function generateControllersWithDump(string $expectedArg): void
    {
        $fileObjects = $this->commonControllerMediator->mediate(
            [Args::CLASS_NAME => FunctionalEntity::class, Args::TYPE => $expectedArg],
            [Options::DUMP => null]
        );

        $this->assertNotFlushedFileObject($fileObjects);
    }

    /**
     * @test
     */
    public function generateDeleteControllerWithoutDump(): void
    {
        InMemoryFileObjectGateway::$fileObjects = [];
        $fileObjects = $this->commonControllerMediator->mediate(
            [Args::CLASS_NAME => FunctionalEntity::class, Args::TYPE => ClassType::DELETE],
            [Options::DUMP => false]
        );

        $this->assertFlushedFileObject($fileObjects);
    }

    public function optionProvider()
    {
        return [
            [ClassType::DELETE],
            [ClassType::GET],
            [ClassType::GET_ALL],
            [ClassType::PATCH],
            [ClassType::POST],
        ];
    }

    protected function setUp(): void
    {
        $this->commonControllerMediator = new CommonControllerMediatorImpl();
        $this->controllerMediator = new ControllerMediatorImpl();
        $this->modelMediator = new ModelMediatorImpl();

        $this->controllerMediator->setDeleteEntityControllerGenerator(
            new GeneratorMock(DeleteEntityControllerGenerator::class, new DeleteEntityControllerFileObjectStub1())
        );
        $this->controllerMediator->setDeleteEntityControllerGeneratorRequestBuilder(
            new DeleteEntityControllerGeneratorRequestBuilderImpl()
        );
        $this->controllerMediator->setGetEntitiesControllerGenerator(
            new GeneratorMock(GetEntitiesControllerGenerator::class, new GetEntitiesControllerFileObjectStub1())
        );
        $this->controllerMediator->setGetEntitiesControllerGeneratorRequestBuilder(
            new GetEntitiesControllerGeneratorRequestBuilderImpl()
        );
        $this->controllerMediator->setGetEntityControllerGenerator(
            new GeneratorMock(GetEntityControllerGenerator::class, new GetEntityControllerFileObjectStub1())
        );
        $this->controllerMediator->setGetEntityControllerGeneratorRequestBuilder(
            new GetEntityControllerGeneratorRequestBuilderImpl()
        );
        $this->controllerMediator->setPatchEntityControllerGenerator(
            new GeneratorMock(PatchEntityControllerGenerator::class, new PatchEntityControllerFileObjectStub1())
        );
        $this->controllerMediator->setPatchEntityControllerGeneratorRequestBuilder(
            new PatchEntityControllerGeneratorRequestBuilderImpl()
        );
        $this->controllerMediator->setPostEntityControllerGenerator(
            new GeneratorMock(PostEntityControllerGenerator::class, new PostEntityControllerFileObjectStub1())
        );
        $this->controllerMediator->setPostEntityControllerGeneratorRequestBuilder(
            new PostEntityControllerGeneratorRequestBuilderImpl()
        );
        $this->modelMediator = new ModelMediatorImpl();
        $this->modelMediator->setPatchEntityModelGenerator(
            new GeneratorMock(PatchEntityModelGenerator::class, new PatchEntityModelFileObjectStub1())
        );
        $this->modelMediator->setPatchEntityModelGeneratorRequestBuilder(
            new PatchEntityModelGeneratorRequestBuilderImpl()
        );
        $this->modelMediator->setEntityModelTraitGenerator(
            new GeneratorMock(EntityModelTraitGenerator::class, new EntityModelTraitFileObjectStub1())
        );
        $this->modelMediator->setEntityModelTraitGeneratorRequestBuilder(
            new EntityModelTraitGeneratorRequestBuilderImpl()
        );
        $this->modelMediator->setPostEntityModelGenerator(
            new GeneratorMock(PostEntityModelGenerator::class, new PostEntityModelFileObjectStub1())
        );
        $this->modelMediator->setPostEntityModelGeneratorRequestBuilder(
            new PostEntityModelGeneratorRequestBuilderImpl()
        );
        $this->modelMediator->setPutEntityModelGenerator(
            new GeneratorMock(PutEntityModelGenerator::class, new PutEntityModelFileObjectStub1())
        );
        $this->modelMediator->setPutEntityModelGeneratorRequestBuilder(
            new PutEntityModelGeneratorRequestBuilderImpl()
        );

        $this->args = [
            ClassType::DELETE  => false,
            ClassType::GET     => false,
            ClassType::GET_ALL => false,
            ClassType::PATCH   => false,
            ClassType::POST    => false,
            ClassType::PUT     => false,
        ];

        $this->commonControllerMediator->setControllerMediator($this->controllerMediator);
        $this->commonControllerMediator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->commonControllerMediator->setModelMediator($this->modelMediator);
    }
}
