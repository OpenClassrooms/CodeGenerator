<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EntityCommonHydratorTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EntityCommonHydratorTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityCommonHydratorTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EntityCommonHydratorTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\EntityCommonHydratorTraitSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Utility\Impl\MethodUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\Impl\MethodUtilityGetAccessorsWithoutId;
use PHPUnit\Framework\TestCase;

class EntityCommonHydratorTraitGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EntityCommonHydratorTraitGenerator
     */
    private $entityCommonHydratorTraitGenerator;

    /**
     * @var EntityCommonHydratorTraitGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->entityCommonHydratorTraitGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityCommonHydratorTraitFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $entityCommonHydratorTraitGeneratorRequestBuilderImpl = new EntityCommonHydratorTraitGeneratorRequestBuilderImpl(
        );
        $this->request = $entityCommonHydratorTraitGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->entityCommonHydratorTraitGenerator = new EntityCommonHydratorTraitGenerator();

        $this->entityCommonHydratorTraitGenerator->setEntityCommonHydratorTraitSkeletonModelAssembler(
            new EntityCommonHydratorTraitSkeletonModelAssemblerMock()
        );
        $this->entityCommonHydratorTraitGenerator->setTemplating(new TemplatingServiceMock());
        $this->entityCommonHydratorTraitGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->entityCommonHydratorTraitGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->entityCommonHydratorTraitGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->entityCommonHydratorTraitGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->entityCommonHydratorTraitGenerator->setMethodUtilityStrategy(
            new MethodUtilityContext(new MethodUtilityGetAccessorsWithoutId())
        );
    }
}
