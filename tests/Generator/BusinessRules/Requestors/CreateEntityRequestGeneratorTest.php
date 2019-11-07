<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\CreateEntityRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\CreateEntityRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\CreateEntityRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors\CreateEntityRequestSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class CreateEntityRequestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var CreateEntityRequestGenerator
     */
    private $createEntityRequestGenerator;

    /**
     * @var CreateEntityRequestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->createEntityRequestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new CreateEntityRequestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $createEntityRequestGeneratorRequestBuilderImpl = new CreateEntityRequestGeneratorRequestBuilderImpl();
        $this->request = $createEntityRequestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->createEntityRequestGenerator = new CreateEntityRequestGenerator();

        $this->createEntityRequestGenerator->setCreateEntityRequestSkeletonModelAssembler(
            new CreateEntityRequestSkeletonModelAssemblerMock()
        );
        $this->createEntityRequestGenerator->setTemplating(new TemplatingServiceMock());
        $this->createEntityRequestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->createEntityRequestGenerator->setUseCaseRequestFileObjectFactory(new UseCaseRequestFileObjectFactoryMock());
    }
}
