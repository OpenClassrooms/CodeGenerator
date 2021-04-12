<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\Models;

use OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request\PatchEntityModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\PatchEntityModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PatchEntityModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\Domain\SubDomain\PatchEntityModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Models\PatchEntityModelSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class PatchEntityModelGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private PatchEntityModelGenerator $patchEntityModelGenerator;

    private PatchEntityModelGeneratorRequest $request;

    /**
     * @test
     */
    final public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->patchEntityModelGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new PatchEntityModelFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $patchEntityModelGeneratorRequestBuilderImpl = new PatchEntityModelGeneratorRequestBuilderImpl();
        $this->request = $patchEntityModelGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->patchEntityModelGenerator = new PatchEntityModelGenerator();

        $this->patchEntityModelGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->patchEntityModelGenerator->setModelFileObjectFactory(new ModelFileObjectFactoryMock());
        $this->patchEntityModelGenerator->setPatchEntityModelSkeletonModelAssembler(
            new PatchEntityModelSkeletonModelAssemblerMock()
        );
        $this->patchEntityModelGenerator->setTemplating(new TemplatingServiceMock());
    }
}
