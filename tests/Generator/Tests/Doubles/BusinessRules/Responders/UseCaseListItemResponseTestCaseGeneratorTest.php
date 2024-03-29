<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class UseCaseListItemResponseTestCaseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private UseCaseListItemResponseTestCaseGeneratorRequest $request;

    private UseCaseListItemResponseTestCaseGenerator $useCaseListItemResponseTestCaseGenerator;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseListItemResponseTestCaseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseListItemResponseTestCaseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseListItemResponseTestCaseGeneratorRequestBuilderImpl = new UseCaseListItemResponseTestCaseGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseListItemResponseTestCaseGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->withFields([])
            ->build();

        $this->useCaseListItemResponseTestCaseGenerator = new UseCaseListItemResponseTestCaseGenerator();

        $this->useCaseListItemResponseTestCaseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->useCaseListItemResponseTestCaseGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseListItemResponseTestCaseGenerator->setUseCaseListItemResponseTestCaseSkeletonModelAssembler(
            new UseCaseListItemResponseTestCaseSkeletonModelAssemblerMock()
        );
        $this->useCaseListItemResponseTestCaseGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
    }
}
