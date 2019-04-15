<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntityRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GetEntityRequestBuilderImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\FileObjectFactoryPrefixType;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestBuilderImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntityRequestBuilderImplGenerator
     */
    private $getEntityRequestBuilderImplGenerator;

    /**
     * @var GetEntityRequestBuilderImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->getEntityRequestBuilderImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntityRequestBuilderImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $getEntityRequestBuilderImplGeneratorRequestBuilderImpl = new GetEntityRequestBuilderImplGeneratorRequestBuilderImpl(
        );
        $this->request = $getEntityRequestBuilderImplGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->getEntityRequestBuilderImplGenerator = new GetEntityRequestBuilderImplGenerator();

        $this->getEntityRequestBuilderImplGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntityRequestBuilderImplGenerator->setGetEntityRequestBuilderImplSkeletonModelAssembler(
            new GetEntityRequestBuilderImplSkeletonModelAssemblerImpl()
        );
        $this->getEntityRequestBuilderImplGenerator->setEntityFileObjectFactory(
            new EntityFileObjectFactoryMock()
        );
        $this->getEntityRequestBuilderImplGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock(FileObjectFactoryPrefixType::GET)
        );
        $this->getEntityRequestBuilderImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntityRequestBuilderImplGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
