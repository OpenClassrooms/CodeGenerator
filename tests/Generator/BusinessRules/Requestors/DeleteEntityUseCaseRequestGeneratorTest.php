<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DeleteEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\DeleteEntityUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\DeleteEntityUseCaseRequestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\DeleteEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors\DeleteEntityUseCaseRequestSkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class DeleteEntityUseCaseRequestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var DeleteEntityUseCaseRequestGenerator
     */
    private $deleteEntityUseCaseRequestGenerator;

    /**
     * @var DeleteEntityUseCaseRequestGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    final public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->deleteEntityUseCaseRequestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new DeleteEntityUseCaseRequestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $deleteEntityUseCaseRequestGeneratorRequestBuilderImpl = new DeleteEntityUseCaseRequestGeneratorRequestBuilderImpl(
        );
        $this->request = $deleteEntityUseCaseRequestGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->deleteEntityUseCaseRequestGenerator = new DeleteEntityUseCaseRequestGenerator();

        $this->deleteEntityUseCaseRequestGenerator->setDeleteEntityUseCaseRequestSkeletonModelAssembler(
            new DeleteEntityUseCaseRequestSkeletonModelAssemblerMock()
        );
        $this->deleteEntityUseCaseRequestGenerator->setTemplating(new TemplatingServiceMock());
        $this->deleteEntityUseCaseRequestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->deleteEntityUseCaseRequestGenerator->setUseCaseRequestFileObjectFactory(
            new UseCaseRequestFileObjectFactoryMock()
        );
    }
}
