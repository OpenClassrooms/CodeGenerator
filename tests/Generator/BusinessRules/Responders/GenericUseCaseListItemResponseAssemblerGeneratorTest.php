<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\GenericUseCaseListItemResponseAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\GenericUseCaseListItemResponseAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Responders\GenericUseCaseListItemResponseAssemblerSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseAssemblerGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseListItemResponseAssemblerGenerator
     */
    private $genericUseCaseListItemResponseAssemblerGenerator;

    /**
     * @var GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseListItemResponseAssemblerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseListItemResponseAssemblerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl = new GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->genericUseCaseListItemResponseAssemblerGenerator = new GenericUseCaseListItemResponseAssemblerGenerator(
        );

        $this->genericUseCaseListItemResponseAssemblerGenerator->setGenericUseCaseListItemResponseAssemblerSkeletonModelAssembler(
            new GenericUseCaseListItemResponseAssemblerSkeletonModelAssemblerMock()
        );
        $this->genericUseCaseListItemResponseAssemblerGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->genericUseCaseListItemResponseAssemblerGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseListItemResponseAssemblerGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
