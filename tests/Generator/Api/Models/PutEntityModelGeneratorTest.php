<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\Models;

use OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request\PutEntityModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\PutEntityModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PutEntityModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\Domain\SubDomain\PutEntityModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Models\PutEntityModelSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class PutEntityModelGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private PutEntityModelGenerator $putEntityModelGenerator;

    private PutEntityModelGeneratorRequest $request;

    /**
     * @test
     */
    final public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->putEntityModelGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new PutEntityModelFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $putEntityModelGeneratorRequestBuilderImpl = new PutEntityModelGeneratorRequestBuilderImpl();
        $this->request = $putEntityModelGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->putEntityModelGenerator = new PutEntityModelGenerator();

        $this->putEntityModelGenerator->setPutEntityModelSkeletonModelAssembler(
            new PutEntityModelSkeletonModelAssemblerMock()
        );
        $this->putEntityModelGenerator->setModelFileObjectFactory(new ModelFileObjectFactoryMock());
        $this->putEntityModelGenerator->setTemplating(new TemplatingServiceMock());
        $this->putEntityModelGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
