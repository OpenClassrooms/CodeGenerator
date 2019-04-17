<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\GenericUseCaseListItemResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\GenericUseCaseListItemResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseListItemResponseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl\GenericUseCaseListItemResponseSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\GenericUseCaseListItemResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseListItemResponseGenerator
     */
    private $genericUseCaseListItemResponseGenerator;

    /**
     * @var GenericUseCaseListItemResponseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseListItemResponseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseListItemResponseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseListItemResponseGeneratorRequestBuilderImpl = new GenericUseCaseListItemResponseGeneratorRequestBuilderImpl();
        $this->request = $genericUseCaseListItemResponseGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->genericUseCaseListItemResponseGenerator = new GenericUseCaseListItemResponseGenerator();

        $this->genericUseCaseListItemResponseGenerator->setGenericUseCaseListItemResponseSkeletonModelAssembler(
            new GenericUseCaseListItemResponseSkeletonModelAssemblerImpl()
        );
        $this->genericUseCaseListItemResponseGenerator->setUseCaseResponseFileObjectFactory(new UseCaseResponseFileObjectFactoryMock());
        $this->genericUseCaseListItemResponseGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseListItemResponseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
