<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseListItemResponseGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl\UseCaseListItemResponseSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseListItemResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class UseCaseListItemResponseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseListItemResponseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var UseCaseListItemResponseGenerator
     */
    private $useCaseListItemResponseGenerator;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseListItemResponseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseListItemResponseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseListItemResponseGeneratorRequestBuilderImpl = new UseCaseListItemResponseGeneratorRequestBuilderImpl();
        $this->request = $useCaseListItemResponseGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->useCaseListItemResponseGenerator = new UseCaseListItemResponseGenerator();

        $this->useCaseListItemResponseGenerator->setUseCaseListItemResponseSkeletonModelAssembler(
            new UseCaseListItemResponseSkeletonModelAssemblerImpl()
        );
        $this->useCaseListItemResponseGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseListItemResponseGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseListItemResponseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
