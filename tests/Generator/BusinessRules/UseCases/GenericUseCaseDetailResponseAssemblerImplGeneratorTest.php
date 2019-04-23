<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseDetailResponseAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GenericUseCaseDetailResponseAssemblerImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseDetailResponseAssemblerImplFileObjectStub1;
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
class GenericUseCaseDetailResponseAssemblerImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GenericUseCaseDetailResponseAssemblerImplGenerator
     */
    private $genericUseCaseDetailResponseAssemblerImplGenerator;

    /**
     * @var GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->genericUseCaseDetailResponseAssemblerImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GenericUseCaseDetailResponseAssemblerImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $genericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl = new GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl(
        );
        $this->request = $genericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->withFields(['getField4'])
            ->build();

        $this->genericUseCaseDetailResponseAssemblerImplGenerator = new GenericUseCaseDetailResponseAssemblerImplGenerator(
        );

        $this->genericUseCaseDetailResponseAssemblerImplGenerator->setGenericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler(
            new GenericUseCaseDetailResponseAssemblerImplSkeletonModelAssemblerImpl()
        );
        $this->genericUseCaseDetailResponseAssemblerImplGenerator->setEntityFileObjectFactory(
            new EntityFileObjectFactoryMock()
        );
        $this->genericUseCaseDetailResponseAssemblerImplGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->genericUseCaseDetailResponseAssemblerImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->genericUseCaseDetailResponseAssemblerImplGenerator->setFileObjectGateway(
            new InMemoryFileObjectGateway()
        );
    }
}
