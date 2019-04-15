<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntityRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GetEntityRequestDTOSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityRequestDTOFileObjectStub1;
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
class GetEntityRequestDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntityRequestDTOGenerator
     */
    private $getEntityRequestDTOGenerator;

    /**
     * @var GetEntityRequestDTOGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->getEntityRequestDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntityRequestDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $getEntityRequestDTOGeneratorRequestBuilderImpl = new GetEntityRequestDTOGeneratorRequestBuilderImpl();
        $this->request = $getEntityRequestDTOGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->getEntityRequestDTOGenerator = new GetEntityRequestDTOGenerator();

        $this->getEntityRequestDTOGenerator->setGetEntityRequestDTOSkeletonModelAssembler(
            new GetEntityRequestDTOSkeletonModelAssemblerImpl()
        );
        $this->getEntityRequestDTOGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntityRequestDTOGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock(FileObjectFactoryPrefixType::GET)
        );
        $this->getEntityRequestDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntityRequestDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
