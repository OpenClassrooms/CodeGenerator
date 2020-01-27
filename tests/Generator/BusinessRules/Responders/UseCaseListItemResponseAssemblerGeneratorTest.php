<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseListItemResponseAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseListItemResponseAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Responders\UseCaseListItemResponseAssemblerSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class UseCaseListItemResponseAssemblerGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseListItemResponseAssemblerGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var UseCaseListItemResponseAssemblerGenerator
     */
    private $useCaseListItemResponseAssemblerGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseListItemResponseAssemblerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseListItemResponseAssemblerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseListItemResponseAssemblerGeneratorRequestBuilderImpl = new UseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseListItemResponseAssemblerGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->useCaseListItemResponseAssemblerGenerator = new UseCaseListItemResponseAssemblerGenerator();

        $this->useCaseListItemResponseAssemblerGenerator->setUseCaseListItemResponseAssemblerSkeletonModelAssembler(
            new UseCaseListItemResponseAssemblerSkeletonModelAssemblerMock()
        );
        $this->useCaseListItemResponseAssemblerGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseListItemResponseAssemblerGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseListItemResponseAssemblerGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
