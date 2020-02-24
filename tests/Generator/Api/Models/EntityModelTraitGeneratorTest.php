<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\Models;

use OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request\EntityModelTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\EntityModelTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\EntityModelTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\Domain\SubDomain\EntityModelTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Models\EntityModelTraitSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class EntityModelTraitGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EntityModelTraitGenerator
     */
    private $entityModelTraitGenerator;

    /**
     * @var EntityModelTraitGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->entityModelTraitGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityModelTraitFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $entityModelTraitGeneratorRequestBuilderImpl = new EntityModelTraitGeneratorRequestBuilderImpl();
        $this->request = $entityModelTraitGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->entityModelTraitGenerator = new EntityModelTraitGenerator();

        $this->entityModelTraitGenerator->setEntityModelTraitSkeletonModelAssembler(
            new EntityModelTraitSkeletonModelAssemblerMock()
        );
        $this->entityModelTraitGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->entityModelTraitGenerator->setModelFileObjectFactory(new ModelFileObjectFactoryMock());
        $this->entityModelTraitGenerator->setTemplating(new TemplatingServiceMock());
    }
}
