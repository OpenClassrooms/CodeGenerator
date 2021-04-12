<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EditEntityUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EditEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditEntityUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseRequestDTOSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class EditEntityUseCaseRequestDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private EditEntityUseCaseRequestDTOGenerator $editEntityUseCaseRequestDTOGenerator;

    private EditEntityUseCaseRequestDTOGeneratorRequest $request;

    /**
     * @test
     */
    final public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->editEntityUseCaseRequestDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EditEntityUseCaseRequestDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $editEntityUseCaseRequestDTOGeneratorRequestBuilderImpl = new EditEntityUseCaseRequestDTOGeneratorRequestBuilderImpl(
        );
        $this->request = $editEntityUseCaseRequestDTOGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->editEntityUseCaseRequestDTOGenerator = new EditEntityUseCaseRequestDTOGenerator();

        $this->editEntityUseCaseRequestDTOGenerator->setEditEntityUseCaseRequestDTOSkeletonModelAssembler(
            new EditEntityUseCaseRequestDTOSkeletonModelAssemblerMock()
        );
        $this->editEntityUseCaseRequestDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->editEntityUseCaseRequestDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->editEntityUseCaseRequestDTOGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
