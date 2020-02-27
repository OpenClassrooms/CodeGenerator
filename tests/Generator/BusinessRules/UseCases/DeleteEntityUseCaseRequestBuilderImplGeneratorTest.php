<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DeleteEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\DeleteEntityUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseRequestBuilderImplSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class DeleteEntityUseCaseRequestBuilderImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var DeleteEntityUseCaseRequestBuilderImplGenerator
     */
    private $deleteEntityUseCaseRequestBuilderImplGenerator;

    /**
     * @var DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->deleteEntityUseCaseRequestBuilderImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new DeleteEntityUseCaseRequestBuilderImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $deleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl = new DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl(
        );
        $this->request = $deleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->deleteEntityUseCaseRequestBuilderImplGenerator = new DeleteEntityUseCaseRequestBuilderImplGenerator();

        $this->deleteEntityUseCaseRequestBuilderImplGenerator->setDeleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler(
            new DeleteEntityUseCaseRequestBuilderImplSkeletonModelAssemblerMock()
        );
        $this->deleteEntityUseCaseRequestBuilderImplGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->deleteEntityUseCaseRequestBuilderImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->deleteEntityUseCaseRequestBuilderImplGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
