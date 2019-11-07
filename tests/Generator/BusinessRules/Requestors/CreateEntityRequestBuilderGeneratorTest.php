<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\CreateEntityRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\CreateEntityRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\CreateEntityRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors\CreateEntityRequestBuilderSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class CreateEntityRequestBuilderGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var CreateEntityRequestBuilderGenerator
     */
    private $createEntityRequestBuilderGenerator;

    /**
     * @var CreateEntityRequestBuilderGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->createEntityRequestBuilderGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new CreateEntityRequestBuilderFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $createEntityRequestBuilderGeneratorRequestBuilderImpl = new CreateEntityRequestBuilderGeneratorRequestBuilderImpl();
        $this->request = $createEntityRequestBuilderGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->createEntityRequestBuilderGenerator = new CreateEntityRequestBuilderGenerator();

        $this->createEntityRequestBuilderGenerator->setCreateEntityRequestBuilderSkeletonModelAssembler(
            new CreateEntityRequestBuilderSkeletonModelAssemblerMock()
        );
        $this->createEntityRequestBuilderGenerator->setTemplating(new TemplatingServiceMock());
        $this->createEntityRequestBuilderGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->createEntityRequestBuilderGenerator->setUseCaseRequestFileObjectFactory(new UseCaseRequestFileObjectFactoryMock());

    }
}
