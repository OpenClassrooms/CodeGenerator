<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\GenericUseCaseDetailResponseAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl\GenericUseCaseDetailResponseAssemblerSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\GenericUseCaseDetailResponseAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseAssemblerGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseDetailResponseAssemblerGenerator
     */
    private $genericUseCaseDetailResponseAssemblerGenerator;

    /**
     * @var GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseDetailResponseAssemblerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseDetailResponseAssemblerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseDetailResponseAssemblerGeneratorRequestBuilderImpl = new GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseDetailResponseAssemblerGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->genericUseCaseDetailResponseAssemblerGenerator = new GenericUseCaseDetailResponseAssemblerGenerator();

        $this->genericUseCaseDetailResponseAssemblerGenerator->setGenericUseCaseDetailResponseAssemblerSkeletonModelAssembler(
            new GenericUseCaseDetailResponseAssemblerSkeletonModelAssemblerImpl()
        );
        $this->genericUseCaseDetailResponseAssemblerGenerator->setEntityFileObjectFactory(
            new EntityFileObjectFactoryMock()
        );
        $this->genericUseCaseDetailResponseAssemblerGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->genericUseCaseDetailResponseAssemblerGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseDetailResponseAssemblerGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
