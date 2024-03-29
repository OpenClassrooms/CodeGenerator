<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntitiesUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntitiesUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors\GetEntitiesUseCaseRequestBuilderSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class GetEntitiesUseCaseRequestBuilderGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private GetEntitiesUseCaseRequestBuilderGenerator $getEntitiesUseCaseRequestBuilderGenerator;

    private GetEntitiesUseCaseRequestBuilderGeneratorRequest $request;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->getEntitiesUseCaseRequestBuilderGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntitiesUseCaseRequestBuilderFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $getEntitiesUseCaseRequestBuilderGeneratorRequestBuilderImpl = new GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilderImpl(
        );
        $this->request = $getEntitiesUseCaseRequestBuilderGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->getEntitiesUseCaseRequestBuilderGenerator = new GetEntitiesUseCaseRequestBuilderGenerator();

        $this->getEntitiesUseCaseRequestBuilderGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->getEntitiesUseCaseRequestBuilderGenerator->setGetEntitiesUseCaseRequestBuilderSkeletonModelAssembler(
            new GetEntitiesUseCaseRequestBuilderSkeletonModelAssemblerMock()
        );
        $this->getEntitiesUseCaseRequestBuilderGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntitiesUseCaseRequestBuilderGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
