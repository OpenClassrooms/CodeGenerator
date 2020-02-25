<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EntityUseCaseCommonRequestTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityUseCaseCommonRequestTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class EntityUseCaseCommonRequestTraitGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EntityUseCaseCommonRequestTraitGenerator
     */
    private $entityUseCaseCommonRequestGenerator;

    /**
     * @var EntityUseCaseCommonRequestTraitGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->entityUseCaseCommonRequestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityUseCaseCommonRequestTraitFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $entityUseCaseCommonRequestGeneratorRequestBuilderImpl = new EntityUseCaseCommonRequestTraitGeneratorRequestBuilderImpl(
        );
        $this->request = $entityUseCaseCommonRequestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->entityUseCaseCommonRequestGenerator = new EntityUseCaseCommonRequestTraitGenerator();

        $this->entityUseCaseCommonRequestGenerator->setEntityUseCaseCommonRequestTraitSkeletonModelAssembler(
            new EntityUseCaseCommonRequestTraitSkeletonModelAssemblerMock()
        );
        $this->entityUseCaseCommonRequestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->entityUseCaseCommonRequestGenerator->setTemplating(new TemplatingServiceMock());
        $this->entityUseCaseCommonRequestGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
