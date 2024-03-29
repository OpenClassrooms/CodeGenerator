<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseDetailResponseAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\UseCaseDetailResponseAssemblerImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseDetailResponseAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class UseCaseDetailResponseAssemblerImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private UseCaseDetailResponseAssemblerImplGeneratorRequest $request;

    private UseCaseDetailResponseAssemblerImplGenerator $useCaseDetailResponseAssemblerImplGenerator;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseDetailResponseAssemblerImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseDetailResponseAssemblerImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl = new UseCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->withFields(['field4'])
            ->build();

        $this->useCaseDetailResponseAssemblerImplGenerator = new UseCaseDetailResponseAssemblerImplGenerator();

        $this->useCaseDetailResponseAssemblerImplGenerator->setUseCaseDetailResponseAssemblerImplSkeletonModelAssembler(
            new UseCaseDetailResponseAssemblerImplSkeletonModelAssemblerImpl()
        );
        $this->useCaseDetailResponseAssemblerImplGenerator->setEntityFileObjectFactory(
            new EntityFileObjectFactoryMock()
        );
        $this->useCaseDetailResponseAssemblerImplGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseDetailResponseAssemblerImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseDetailResponseAssemblerImplGenerator->setFileObjectGateway(
            new InMemoryFileObjectGateway()
        );
    }
}
