<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DeleteEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\DeleteEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors\DeleteEntityUseCaseRequestBuilderSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class DeleteEntityUseCaseRequestBuilderGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var DeleteEntityUseCaseRequestBuilderGenerator
     */
    private $deleteEntityUseCaseRequestBuilderGenerator;

    /**
     * @var DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->deleteEntityUseCaseRequestBuilderGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new DeleteEntityUseCaseRequestBuilderFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $deleteEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl = new DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl(
        );
        $this->request = $deleteEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->deleteEntityUseCaseRequestBuilderGenerator = new DeleteEntityUseCaseRequestBuilderGenerator();

        $this->deleteEntityUseCaseRequestBuilderGenerator->setDeleteEntityUseCaseRequestBuilderSkeletonModelAssembler(
            new DeleteEntityUseCaseRequestBuilderSkeletonModelAssemblerMock()
        );
        $this->deleteEntityUseCaseRequestBuilderGenerator->setTemplating(new TemplatingServiceMock());
        $this->deleteEntityUseCaseRequestBuilderGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->deleteEntityUseCaseRequestBuilderGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
