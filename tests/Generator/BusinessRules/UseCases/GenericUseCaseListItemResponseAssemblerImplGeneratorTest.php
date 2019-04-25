<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseListItemResponseAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseListItemResponseAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseAssemblerImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseListItemResponseAssemblerImplGenerator
     */
    private $genericUseCaseListItemResponseAssemblerImplGenerator;

    /**
     * @var GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseListItemResponseAssemblerImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseListItemResponseAssemblerImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl = new GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->withFields([])
            ->build();

        $this->genericUseCaseListItemResponseAssemblerImplGenerator = new GenericUseCaseListItemResponseAssemblerImplGenerator(
        );

        $this->genericUseCaseListItemResponseAssemblerImplGenerator->setGenericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler(
            new GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssemblerMock()
        );
        $this->genericUseCaseListItemResponseAssemblerImplGenerator->setEntityFileObjectFactory(
            new EntityFileObjectFactoryMock()
        );
        $this->genericUseCaseListItemResponseAssemblerImplGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->genericUseCaseListItemResponseAssemblerImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseListItemResponseAssemblerImplGenerator->setFileObjectGateway(
            new InMemoryFileObjectGateway()
        );
    }
}
