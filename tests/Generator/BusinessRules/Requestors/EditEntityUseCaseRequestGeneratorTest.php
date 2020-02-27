<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\EditEntityUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\EditEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\EditEntityUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\EditEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors\EditEntityUseCaseRequestSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Utility\Impl\MethodUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityGetAccessorsWithoutId;
use PHPUnit\Framework\TestCase;

class EditEntityUseCaseRequestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EditEntityUseCaseRequestGenerator
     */
    private $editEntityUseCaseRequestGenerator;

    /**
     * @var EditEntityUseCaseRequestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->editEntityUseCaseRequestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EditEntityUseCaseRequestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $editEntityUseCaseRequestGeneratorRequestBuilderImpl = new EditEntityUseCaseRequestGeneratorRequestBuilderImpl(
        );
        $this->request = $editEntityUseCaseRequestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->editEntityUseCaseRequestGenerator = new EditEntityUseCaseRequestGenerator();

        $this->editEntityUseCaseRequestGenerator->setEditEntityUseCaseRequestSkeletonModelAssembler(
            new EditEntityUseCaseRequestSkeletonModelAssemblerMock()
        );
        $this->editEntityUseCaseRequestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->editEntityUseCaseRequestGenerator->setTemplating(new TemplatingServiceMock());
        $this->editEntityUseCaseRequestGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
