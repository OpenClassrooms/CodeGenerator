<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EditEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditEntityUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseRequestBuilderImplSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class EditEntityUseCaseRequestBuilderImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EditEntityUseCaseRequestBuilderImplGenerator
     */
    private $editEntityUseCaseRequestBuilderImplGenerator;

    /**
     * @var EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->editEntityUseCaseRequestBuilderImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EditEntityUseCaseRequestBuilderImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $editEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl = new EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl(
        );
        $this->request = $editEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->editEntityUseCaseRequestBuilderImplGenerator = new EditEntityUseCaseRequestBuilderImplGenerator();

        $this->editEntityUseCaseRequestBuilderImplGenerator->setEditEntityUseCaseRequestBuilderImplSkeletonModelAssembler(
            new EditEntityUseCaseRequestBuilderImplSkeletonModelAssemblerMock()
        );
        $this->editEntityUseCaseRequestBuilderImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->editEntityUseCaseRequestBuilderImplGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->editEntityUseCaseRequestBuilderImplGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
