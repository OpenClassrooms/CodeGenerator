<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntityUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class GetEntityUseCaseRequestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var GetEntityUseCaseRequestGenerator
     */
    private $getEntityUseCaseRequestGenerator;

    /**
     * @var GetEntityUseCaseRequestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->getEntityUseCaseRequestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new GetEntityUseCaseRequestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $getEntityUseCaseRequestGeneratorRequestBuilderImpl = new GetEntityUseCaseRequestGeneratorRequestBuilderImpl();
        $this->request = $getEntityUseCaseRequestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->getEntityUseCaseRequestGenerator = new GetEntityUseCaseRequestGenerator();

        $this->getEntityUseCaseRequestGenerator->setGetEntityUseCaseRequestSkeletonModelAssembler(
            new GetEntityUseCaseRequestSkeletonModelAssemblerMock()
        );
        $this->getEntityUseCaseRequestGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->getEntityUseCaseRequestGenerator->setUseCaseFileObjectFactory(new UseCaseFileObjectFactoryMock());
        $this->getEntityUseCaseRequestGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
        $this->getEntityUseCaseRequestGenerator->setTemplating(new TemplatingServiceMock());
        $this->getEntityUseCaseRequestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
