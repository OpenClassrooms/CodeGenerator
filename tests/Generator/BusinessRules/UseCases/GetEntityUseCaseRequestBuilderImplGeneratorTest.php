<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GetEntityUseCaseRequestBuilderImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplFileObjectStub1;
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
class GetEntityUseCaseRequestBuilderImplGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntityUseCaseRequestBuilderImplGenerator
     */
    private $getEntityUseCaseRequestBuilderImplGenerator;

    /**
     * @var GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->getEntityUseCaseRequestBuilderImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntityUseCaseRequestBuilderImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $getEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl = new GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl(
        );
        $this->request = $getEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->getEntityUseCaseRequestBuilderImplGenerator = new GetEntityUseCaseRequestBuilderImplGenerator();

        $this->getEntityUseCaseRequestBuilderImplGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntityUseCaseRequestBuilderImplGenerator->setGetEntityUseCaseRequestBuilderImplSkeletonModelAssembler(
            new GetEntityUseCaseRequestBuilderImplSkeletonModelAssemblerImpl()
        );
        $this->getEntityUseCaseRequestBuilderImplGenerator->setEntityFileObjectFactory(
            new EntityFileObjectFactoryMock()
        );
        $this->getEntityUseCaseRequestBuilderImplGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock(FileObjectFactoryPrefixType::GET)
        );
        $this->getEntityUseCaseRequestBuilderImplGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntityUseCaseRequestBuilderImplGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
