<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseAssemblerMockGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerMockGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class UseCaseDetailResponseAssemblerMockGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private UseCaseDetailResponseAssemblerMockGeneratorRequest $request;

    private UseCaseDetailResponseAssemblerMockGenerator $useCaseDetailResponseAssemblerMockGenerator;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseDetailResponseAssemblerMockGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseDetailResponseAssemblerMockFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseDetailResponseAssemblerMockGeneratorRequestBuilderImpl = new UseCaseDetailResponseAssemblerMockGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseDetailResponseAssemblerMockGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->useCaseDetailResponseAssemblerMockGenerator = new UseCaseDetailResponseAssemblerMockGenerator();
        $this->useCaseDetailResponseAssemblerMockGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->useCaseDetailResponseAssemblerMockGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseDetailResponseAssemblerMockGenerator->setUseCaseDetailResponseAssemblerMockSkeletonModelAssembler(
            new UseCaseDetailResponseAssemblerMockSkeletonModelAssemblerMock()
        );
        $this->useCaseDetailResponseAssemblerMockGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
    }
}
