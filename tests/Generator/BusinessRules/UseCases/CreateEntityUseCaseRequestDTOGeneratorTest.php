<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateEntityUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class CreateEntityUseCaseRequestDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var CreateEntityUseCaseRequestDTOGenerator
     */
    private $createEntityUseCaseRequestDTOGenerator;

    /**
     * @var CreateEntityUseCaseRequestDTOGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->createEntityUseCaseRequestDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new CreateEntityUseCaseRequestDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $createEntityUseCaseRequestDTOGeneratorRequestBuilderImpl = new CreateEntityUseCaseRequestDTOGeneratorRequestBuilderImpl(
        );
        $this->request = $createEntityUseCaseRequestDTOGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->createEntityUseCaseRequestDTOGenerator = new CreateEntityUseCaseRequestDTOGenerator();

        $this->createEntityUseCaseRequestDTOGenerator->setCreateEntityUseCaseRequestDTOSkeletonModelAssembler(
            new CreateEntityUseCaseRequestDTOSkeletonModelAssemblerMock()
        );
        $this->createEntityUseCaseRequestDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->createEntityUseCaseRequestDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->createEntityUseCaseRequestDTOGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
