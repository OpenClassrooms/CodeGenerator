<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntitiesUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntitiesUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntitiesUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors\GetEntitiesUseCaseRequestSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class GetEntitiesUseCaseRequestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private GetEntitiesUseCaseRequestGenerator $getEntitiesUseCaseRequestGenerator;

    private GetEntitiesUseCaseRequestGeneratorRequest $request;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->getEntitiesUseCaseRequestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntitiesUseCaseRequestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $getEntitiesUseCaseRequestGeneratorRequestBuilderImpl = new GetEntitiesUseCaseRequestGeneratorRequestBuilderImpl(
        );
        $this->request = $getEntitiesUseCaseRequestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->getEntitiesUseCaseRequestGenerator = new GetEntitiesUseCaseRequestGenerator();

        $this->getEntitiesUseCaseRequestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->getEntitiesUseCaseRequestGenerator->setGetEntitiesUseCaseRequestSkeletonModelAssembler(
            new GetEntitiesUseCaseRequestSkeletonModelAssemblerMock()
        );
        $this->getEntitiesUseCaseRequestGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntitiesUseCaseRequestGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
