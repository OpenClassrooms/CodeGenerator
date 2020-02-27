<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateRequestTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateRequestTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateRequestTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateRequestTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\CreateRequestTraitSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class CreateRequestTraitGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var CreateRequestTraitGenerator
     */
    private $createRequestTraitGenerator;

    /**
     * @var CreateRequestTraitGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->createRequestTraitGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new CreateRequestTraitFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $createRequestTraitGeneratorRequestBuilderImpl = new CreateRequestTraitGeneratorRequestBuilderImpl();
        $this->request = $createRequestTraitGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->createRequestTraitGenerator = new CreateRequestTraitGenerator();

        $this->createRequestTraitGenerator->setCreateRequestTraitSkeletonModelAssembler(
            new CreateRequestTraitSkeletonModelAssemblerMock()
        );
        $this->createRequestTraitGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->createRequestTraitGenerator->setTemplating(new TemplatingServiceMock());
        $this->createRequestTraitGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
