<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntityRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\GetEntityRequestSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntityRequestGenerator
     */
    private $getEntityRequestGenerator;

    /**
     * @var GetEntityRequestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->getEntityRequestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntityRequestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $getEntityRequestGeneratorRequestBuilderImpl = new GetEntityRequestGeneratorRequestBuilderImpl();
        $this->request = $getEntityRequestGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->getEntityRequestGenerator = new GetEntityRequestGenerator();

        $this->getEntityRequestGenerator->setGetEntityRequestSkeletonModelAssembler(
            new GetEntityRequestSkeletonModelAssemblerMock()
        );
        $this->getEntityRequestGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntityRequestGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->getEntityRequestGenerator->setUseCaseRequestFileObjectFactory(new UseCaseRequestFileObjectFactoryMock());
        $this->getEntityRequestGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntityRequestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
