<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseCommonFieldTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\BusinessRules\Entities\Domain\SubDomain\EntityFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class UseCaseResponseCommonFieldTraitGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private UseCaseResponseCommonFieldTraitGeneratorRequest $request;

    private UseCaseResponseCommonFieldTraitGenerator $useCaseResponseCommonFieldTraitGenerator;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseResponseCommonFieldTraitGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseResponseCommonFieldTraitFileObjectStub1(), $actualFileObject);
    }

    /**
     * @test
     */
    public function generateReturnFileObjectWithEntityFields(): void
    {
        $request = (new UseCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl())
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->withFields([])
            ->build();

        $actualFileObject = $this->useCaseResponseCommonFieldTraitGenerator->generate($request);
        $this->assertFieldObjects($actualFileObject->getFields(), (new EntityFileObjectStub1())->getFields());
    }

    protected function setUp(): void
    {
        $useCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl = new UseCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->withFields(['field1', 'field2', 'id', 'field3'])
            ->build();

        $this->useCaseResponseCommonFieldTraitGenerator = new UseCaseResponseCommonFieldTraitGenerator();

        $this->useCaseResponseCommonFieldTraitGenerator->setUseCaseResponseCommonFieldTraitSkeletonModelAssembler(
            new UseCaseResponseCommonFieldTraitSkeletonModelAssemblerMock()
        );
        $this->useCaseResponseCommonFieldTraitGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->useCaseResponseCommonFieldTraitGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseResponseCommonFieldTraitGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseResponseCommonFieldTraitGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
