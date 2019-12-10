<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class GetEntityUseCaseRequestBuilderGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntityUseCaseRequestBuilderGenerator
     */
    private $getEntityUseCaseRequestBuilderGenerator;

    /**
     * @var GetEntityUseCaseRequestBuilderGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->getEntityUseCaseRequestBuilderGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntityUseCaseRequestBuilderFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $getEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl = new GetEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl(
        );
        $this->request = $getEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->getEntityUseCaseRequestBuilderGenerator = new GetEntityUseCaseRequestBuilderGenerator();

        $this->getEntityUseCaseRequestBuilderGenerator->setGetEntityUseCaseRequestBuilderSkeletonModelAssembler(
            new GetEntityUseCaseRequestBuilderSkeletonModelAssemblerMock()
        );
        $this->getEntityUseCaseRequestBuilderGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntityUseCaseRequestBuilderGenerator->setUseCaseFileObjectFactory(
            new UseCaseFileObjectFactoryMock()
        );
        $this->getEntityUseCaseRequestBuilderGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->getEntityUseCaseRequestBuilderGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntityUseCaseRequestBuilderGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
