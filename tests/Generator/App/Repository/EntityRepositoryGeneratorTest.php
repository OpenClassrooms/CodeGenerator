<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\App\Repository;

use OpenClassrooms\CodeGenerator\Generator\App\Repository\DTO\Request\EntityRepositoryGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\EntityRepositoryGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\App\Repository\EntityRepositoryFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\App\Repository\EntityRepositorySkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class EntityRepositoryGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EntityRepositoryGenerator
     */
    private $entityRepositoryGenerator;

    /**
     * @var EntityRepositoryGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->entityRepositoryGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityRepositoryFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $entityRepositoryGeneratorRequestBuilderImpl = new EntityRepositoryGeneratorRequestBuilderImpl();
        $this->request = $entityRepositoryGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->entityRepositoryGenerator = new EntityRepositoryGenerator();
        $this->entityRepositoryGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->entityRepositoryGenerator->setEntityRepositorySkeletonModelAssembler(
            new EntityRepositorySkeletonModelAssemblerMock()
        );
        $this->entityRepositoryGenerator->setTemplating(new TemplatingServiceMock());
        $this->entityRepositoryGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
