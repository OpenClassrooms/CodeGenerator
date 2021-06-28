<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\DTO\Request\EntityFactoryGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\EntityFactoryGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\Request\EntityFactoryGeneratorRequest;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFactoryFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Entities\EntityFactorySkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class EntityFactoryGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private EntityFactoryGenerator $entityFactoryGenerator;

    private EntityFactoryGeneratorRequest $request;

    /**
     * @test
     */
    final public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->entityFactoryGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityFactoryFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $entityFactoryGeneratorRequestBuilderImpl = new EntityFactoryGeneratorRequestBuilderImpl();
        $this->request = $entityFactoryGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->entityFactoryGenerator = new EntityFactoryGenerator();

        $this->entityFactoryGenerator->setEntityFactorySkeletonModelAssembler(
            new EntityFactorySkeletonModelAssemblerMock()
        );
        $this->entityFactoryGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->entityFactoryGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->entityFactoryGenerator->setTemplating(new TemplatingServiceMock());
    }
}
