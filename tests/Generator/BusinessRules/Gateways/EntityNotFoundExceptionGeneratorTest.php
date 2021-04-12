<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request\EntityNotFoundExceptionGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityNotFoundExceptionGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequest;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Gateways\EntityNotFoundExceptionFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Gateways\EntityNotFoundExceptionSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class EntityNotFoundExceptionGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private EntityNotFoundExceptionGenerator $entityNotFoundExceptionGenerator;

    private EntityNotFoundExceptionGeneratorRequest $request;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->entityNotFoundExceptionGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityNotFoundExceptionFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $entityNotFoundExceptionGeneratorRequestBuilderImpl = new EntityNotFoundExceptionGeneratorRequestBuilderImpl();
        $this->request = $entityNotFoundExceptionGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->entityNotFoundExceptionGenerator = new EntityNotFoundExceptionGenerator();

        $this->entityNotFoundExceptionGenerator->setEntityNotFoundExceptionSkeletonModelAssembler(
            new EntityNotFoundExceptionSkeletonModelAssemblerMock()
        );
        $this->entityNotFoundExceptionGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->entityNotFoundExceptionGenerator->setTemplating(new TemplatingServiceMock());
        $this->entityNotFoundExceptionGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
