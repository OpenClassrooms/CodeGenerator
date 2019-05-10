<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntityUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestDTOGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GetEntityUseCaseRequestDTOSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestDTOGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntityUseCaseRequestDTOGenerator
     */
    private $getEntityUseCaseRequestDTOGenerator;

    /**
     * @var GetEntityUseCaseRequestDTOGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->getEntityUseCaseRequestDTOGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntityUseCaseRequestDTOFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $getEntityUseCaseRequestDTOGeneratorRequestBuilderImpl = new GetEntityUseCaseRequestDTOGeneratorRequestBuilderImpl();
        $this->request = $getEntityUseCaseRequestDTOGeneratorRequestBuilderImpl
            ->create()
            ->withEntity(FunctionalEntity::class)
            ->build();

        $this->getEntityUseCaseRequestDTOGenerator = new GetEntityUseCaseRequestDTOGenerator();

        $this->getEntityUseCaseRequestDTOGenerator->setGetEntityUseCaseRequestDTOSkeletonModelAssembler(
            new GetEntityUseCaseRequestDTOSkeletonModelAssemblerImpl()
        );
        $this->getEntityUseCaseRequestDTOGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntityUseCaseRequestDTOGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->getEntityUseCaseRequestDTOGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntityUseCaseRequestDTOGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}