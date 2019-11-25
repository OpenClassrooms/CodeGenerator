<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\CreateEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\CreateEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityUseCaseRequestBuilderGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\CreateEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors\CreateEntityUseCaseRequestBuilderSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class CreateEntityUseCaseRequestBuilderGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var CreateEntityUseCaseRequestBuilderGenerator
     */
    private $createEntityUseCaseRequestBuilderGenerator;

    /**
     * @var CreateEntityUseCaseRequestBuilderGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->createEntityUseCaseRequestBuilderGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new CreateEntityUseCaseRequestBuilderFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $createEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl = new CreateEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl();
        $this->request = $createEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->createEntityUseCaseRequestBuilderGenerator = new CreateEntityUseCaseRequestBuilderGenerator();

        $this->createEntityUseCaseRequestBuilderGenerator->setCreateEntityUseCaseRequestBuilderSkeletonModelAssembler(
            new CreateEntityUseCaseRequestBuilderSkeletonModelAssemblerMock()
        );
        $this->createEntityUseCaseRequestBuilderGenerator->setTemplating(new TemplatingServiceMock());
        $this->createEntityUseCaseRequestBuilderGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->createEntityUseCaseRequestBuilderGenerator->setUseCaseRequestFileObjectFactory(new UseCaseRequestFileObjectFactoryMock());

    }
}
