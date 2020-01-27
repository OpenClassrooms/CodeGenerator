<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateEntityUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestBuilderImplSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class CreateEntityUseCaseRequestBuilderImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var CreateEntityUseCaseRequestBuilderImplGenerator
     */
    private $createEntityUseCaseRequestBuilderImplGenerator;

    /**
     * @var CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->createEntityUseCaseRequestBuilderImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new CreateEntityUseCaseRequestBuilderImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $createEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl = new CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl(
        );
        $this->request = $createEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->createEntityUseCaseRequestBuilderImplGenerator = new CreateEntityUseCaseRequestBuilderImplGenerator();

        $this->createEntityUseCaseRequestBuilderImplGenerator->setCreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler(
            new CreateEntityUseCaseRequestBuilderImplSkeletonModelAssemblerMock()
        );
        $this->createEntityUseCaseRequestBuilderImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->createEntityUseCaseRequestBuilderImplGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->createEntityUseCaseRequestBuilderImplGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
