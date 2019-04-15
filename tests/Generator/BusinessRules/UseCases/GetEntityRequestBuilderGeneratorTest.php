<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntityRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GetEntityRequestBuilderSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\FileObjectFactoryPrefixType;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases\GetEntityRequestBuilderSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestBuilderGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntityRequestBuilderGenerator
     */
    private $getEntityRequestBuilderGenerator;

    /**
     * @var GetEntityRequestBuilderGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->getEntityRequestBuilderGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntityRequestBuilderFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $getEntityRequestBuilderGeneratorRequestBuilderImpl = new GetEntityRequestBuilderGeneratorRequestBuilderImpl();
        $this->request = $getEntityRequestBuilderGeneratorRequestBuilderImpl
            ->create()
            ->withDefaultValue(FunctionalEntity::class)
            ->build();

        $this->getEntityRequestBuilderGenerator = new GetEntityRequestBuilderGenerator();

        $this->getEntityRequestBuilderGenerator->setGetEntityRequestBuilderSkeletonModelAssembler(
            new GetEntityRequestBuilderSkeletonModelAssemblerMock()
        );
        $this->getEntityRequestBuilderGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntityRequestBuilderGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock(FileObjectFactoryPrefixType::GET));
        $this->getEntityRequestBuilderGenerator->setUseCaseRequestFileObjectFactory(new UseCaseRequestFileObjectFactoryMock(FileObjectFactoryPrefixType::GET));
        $this->getEntityRequestBuilderGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntityRequestBuilderGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
