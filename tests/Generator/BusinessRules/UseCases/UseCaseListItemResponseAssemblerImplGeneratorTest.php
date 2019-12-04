<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class UseCaseListItemResponseAssemblerImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var UseCaseListItemResponseAssemblerImplGenerator
     */
    private $useCaseListItemResponseAssemblerImplGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseListItemResponseAssemblerImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseListItemResponseAssemblerImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl = new UseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->withFields([])
            ->build();

        $this->useCaseListItemResponseAssemblerImplGenerator = new UseCaseListItemResponseAssemblerImplGenerator();

        $this->useCaseListItemResponseAssemblerImplGenerator->setUseCaseListItemResponseAssemblerImplSkeletonModelAssembler(
            new UseCaseListItemResponseAssemblerImplSkeletonModelAssemblerMock()
        );
        $this->useCaseListItemResponseAssemblerImplGenerator->setEntityFileObjectFactory(
            new EntityFileObjectFactoryMock()
        );
        $this->useCaseListItemResponseAssemblerImplGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseListItemResponseAssemblerImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseListItemResponseAssemblerImplGenerator->setFileObjectGateway(
            new InMemoryFileObjectGateway()
        );
    }
}
